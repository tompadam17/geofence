<?php
   require_once("../secure/db.php");
   session_start();
  if(!isset($_SESSION['admin'])  OR  empty($_GET['id'])){
      //header("location:login.php");
      die("Something went wrong");
   }

   else
   {


   	  $uname = $_SESSION['admin'];
   	  $id = $_GET['id'];
      $sql = "SELECT * FROM users WHERE uname = '$uname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM student,status WHERE status.id = $id and student.username=status.uname ";

      $result2 = mysqli_query($db,$sql2);
      $track_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);


      

      #echo '<pre>';
      #print_r($row);
      #echo $uname;
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
		<?php include 'sidebar.php'; ?>
		<div class="col-md-9">
            <div class="profile-content">

            <legend>Last tracked location for <?= $track_data['full_name']; ?></legend>

            		<div id="map"></div>
    

            </div>
		</div>
	</div>
</div>
	<?php include '../footer.php'; ?>

	
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&signed_in=true&libraries=geometry,places&callback=initMap" async defer></script>

<script type="text/javascript">
		
    function initMap() {
      var myLatlng = new google.maps.LatLng(<?= $track_data['lat']; ?>, <?= $track_data['lng']; ?>);
      var myOptions = {
        zoom: 18,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map"), myOptions);

      //var markerPos = new google.maps.LatLng(51.515252, -0.189852);


      var marker = new google.maps.Marker({
		   position: myLatlng,
		   map: map,
		   title: "PC Pro Offices"
		});

    }

    

</script>

</html>