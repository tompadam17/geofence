<?php
   require_once("../secure/db.php");
   session_start();
  if(!isset($_SESSION['admin'])){
      header("location:login.php");
      die();
   }

   else
   {


   	  $uname = $_SESSION['admin'];
      $sql = "SELECT * FROM users WHERE uname = '$uname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM (SELECT * FROM student,status WHERE status.status = 'outside' and student.username=status.uname ORDER BY status.id DESC ) AS data GROUP BY data.uname";

      $result2 = mysqli_query($db,$sql2);
      $track_data = array();

          while($data = $result2->fetch_assoc()) {
        	$track_data[] = $data;
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
            <div class="col-lg-12">
            <legend>Following Students are Outside</legend>
				<div class="table-responsive">
			  		<table class="table table-hover table-bordered">
					<tr class="text-success">
						<td class="text-center"><strong>#</strong></td>
			        	<td><strong>Roll no</strong></td>
			        	<td><strong>Student Name</strong></td>
			        	<td><strong>Logged Time</strong></td>			        				        	
			        	<td class=" text-danger text-center"><strong>Action</strong></td>
			        </tr>
					<?php foreach ($track_data as $row => $value ): ?>   
			        <tr>
			        	<td class="text-center"><?php echo $row+1; ?></td>
			        	<td><?php echo $value['username']; ?></td>
			        	<td><?php echo $value['full_name']; ?></td>
			        	<td><?php echo date("d-M-Y , h:i A", strtotime($value['time'])); ?></td>
			        	<td class="text-center"><a href="locate.php?id=<?php echo $value['id']; ?>" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-globe"></span> Locate <?php echo $value['full_name']; ?></a>			        	
			        	</td>
			        </tr>
					<?php endforeach; ?>
					</table>
				</div>
			</fieldset>
        </div>
    

            </div>
		</div>
	</div>
</div>
	<?php include '../footer.php'; ?>	
</body>

</html>