<?php
   require_once("../secure/db.php");
   session_start();
  if(!isset($_SESSION['student'])){
      header("location:login.php");
      die();
   }

   else
   {


      $uname = $_SESSION['student'];
      $sql = "SELECT * FROM student WHERE username = '$uname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM org WHERE org_id = '$org_id'";

      $result2 = mysqli_query($db,$sql2);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);

      /*echo "<pre>";
      echo $sql2.'<br>';
      print_r($row);
      die();
      echo "</pre>"; */

      #echo '<pre>';
      #print_r($row);
      #echo $row['uname'];
      #echo '</pre>';
      #die();      
      $count = mysqli_num_rows($result);

   }

?>

<?php include('../header.php'); ?>
<link rel="stylesheet" type="text/css" href="../assets/css/profile.css">

<title>Profile</title>

</head>

<body>
<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Geolocation" class="logo" src="../assets/images/logo.png">
      </a>
    </div>
  </div>
</nav>
</header>


<div class="container-fluid">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="../assets/avatar.jpg" alt="<?= $row['full_name']; ?>" class="img-responsive img-circle" />
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?= $row['full_name']; ?>
          </div>
          <div class="profile-usertitle-job">
            <?= $row['username']; ?>
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Follow</button>
          <button type="button" class="btn btn-danger btn-sm">Message</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="#">
              <i class="glyphicon glyphicon-home"></i>
              Get Current Location </a>
            </li>
            <li>
              <a href="#">
              <i class="glyphicon glyphicon-user"></i>
              Location History </a>
            </li>
            <li>
              <a href="#">
              <i class="glyphicon glyphicon-ok"></i>
              Account Settings </a>
            </li>
            <li>
              <a href="org.php">
              <i class="glyphicon glyphicon-flag"></i>
              About Organization </a>
            </li>
            <li>
              <a href="logout.php">
              <i class="glyphicon glyphicon-flag"></i>
              Logout </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-9">
            <div class="profile-content">
              <div id="map"></div>
            </div>
    </div>
  </div>
</div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&signed_in=true&libraries=geometry,places&callback=initMap" async defer></script>
<script type="text/javascript">
function initMap() 
{
     var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 15,
             center: {
                 lat: 9.9000,
                 lng: 76.7170
             },
             mapTypeId: google.maps.MapTypeId.ROADMAP
         });
     var geocoder = new google.maps.Geocoder();
     var contentString =
         '<h2>We detected this as your Location</h2><small>Drag and Drop to change location</small>';
     var infowindow = new google.maps.InfoWindow({
         content: contentString
     });
    if (navigator.geolocation) 
    {
     navigator.geolocation.getCurrentPosition(
         function(position) {
             var pos = {
                 lat: position.coords.latitude,
                 lng: position.coords.longitude
             };            
             console.log(position);
             var marker = new google.maps.Marker({
                 position: pos,
                 map: map,
                 draggable: true,
                 title: 'Your Location'
             });
             geocoder.geocode({
                 'location': pos
             }, function(results, status) {
                 if (status === google.maps.GeocoderStatus
                     .OK) {                    
                     if (results[1]) {
                         infowindow.setContent(
                             '<h4>We detected this as your Location</h4><br>' + results[1].formatted_address);                         
                     }
                 }
             });
             marker.addListener('click',function() {
                     // 3 seconds after the center of the map has changed, pan back to the
                     // marker.
                     var pos = {
                         lat: this.position.lat(),
                         lng: this.position.lng()
                     };
                     geocoder.geocode({
                         'location': pos
                     }, function(results, status) {
                         if (status === google.maps.GeocoderStatus
                             .OK) {
                             if (results[1]) {
                                 infowindow.setContent('<h4>We detected this as your Location</h4><br><blockquote style="color:green"> <h5>'+results[1].formatted_address +'</h5></blockquote><br><a class="btn btn-success" href="#">Save position</a>');
                                 infowindow.open(map,marker);
                             }
                         }
                     });
                 });
             map.setCenter(pos);
         },
         function() {
             handleLocationError(true,
                 infoWindow, map.getCenter());
         });
    } 
    else 
    {
     // Browser doesn't support Geolocation
     handleLocationError(false, infoWindow,
         map.getCenter());
    }
}
</script>
  
    <?php include '../footer.php'; ?>

</body>

</html>