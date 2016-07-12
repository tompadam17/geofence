<?php
   require_once("../secure/db.php");
   session_start();
  if(!isset($_SESSION['admin'])){
      //header("location:login.php");
      die("Something went wrong");
   }

   else
   {

   	  $uname = $_SESSION['admin'];
   	  $id = $_GET['id'];
      $sql = "SELECT * FROM student WHERE org_id is NULL ";
      $result = mysqli_query($db,$sql);      
      $sql2 = "SELECT * FROM org ";

      $result2 = mysqli_query($db,$sql2);

       while($data = $result->fetch_assoc()) {
        	$student_data[] = $data;
    	}

       while($data = $result2->fetch_assoc()) {
        	$org_data[] = $data;
    	}


      

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

            <legend>Assign Organisation</legend> 

            <?php if(empty($student_data) OR empty($org_data)): ?>
                <div class="well">       	
                	<h3 class="text-danger">No Data Available</h3>
                </div>
                <?php else:
				

				foreach ($student_data as $key => $value): ?>
					

				<div class="col-xs-8">
	                <div class="input-group">
	                    <blockquote class="text-danger"><?= $value['full_name']; ?></blockquote>
	                    <div class="input-group-btn">
	                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Select Organisation<span class="caret"></span></button>
	                        <ul class="dropdown-menu pull-right">
	                        <?php foreach ($org_data as $key => $org): ?>
	                            <li><a href="setorg.php?uid=<?= $value['uid'];?>&org_id=<?= $org['org_id']; ?>"><?= $org['org_name']; ?></a></li>
	                        <?php endforeach; ?>
	                        </ul>
	                    </div>
	                </div>
	            </div>


	        <?php endforeach; endif; ?>
    

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