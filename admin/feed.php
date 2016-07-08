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
      $sql = "SELECT * FROM users WHERE uname = '$uname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $userid =  $_GET['id'];
      $sql2 = "SELECT * FROM student,status WHERE status.status = 'outside' and student.username=status.uname and student.uid = $userid ORDER BY status.id DESC LIMIT 5";

      $result2 = mysqli_query($db,$sql2);
      $track_data = array();

          while($data = $result2->fetch_assoc()) {
          $track_data[] = $data;
      }


      #print_r($track_data);

      $nearby = array();

      foreach ($track_data as $key => $value) {

        $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$value[lat].','.$value[lng].'&radius=100&key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0';
        
        $nearby [] = file_get_contents($url);

       echo $url.'<br> <br>';

      }


      echo '<pre>';
      print_r($nearby);

      

      #echo '<pre>';
      #print_r($row);
      #echo $uname;
      #echo '</pre>';
      die();      
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

            <?php 
         /*   echo '<pre>';

            foreach ($track_data as $row => $value ) {
              
              print_r($value);
              echo $value['username'];
            }
            die();
            print_r($track_data);
            echo '</pre>';*/

            ?>

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