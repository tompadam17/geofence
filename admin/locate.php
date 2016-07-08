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
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://graph.facebook.com/<?= $row['fbid']; ?>/picture?height=200&width=200" alt="Dennis K Bijo" class="img-responsive img-circle" />
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?= $row['name']; ?>
					</div>
					<div class="profile-usertitle-job">
						Administrator
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
							<a href="tracker.php">
							<i class="glyphicon glyphicon-flag"></i>
							See who's out </a>
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