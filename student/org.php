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
            <li>
              <a href="profile.php">
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
            <li class="active">
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
                <div class="hero-unit">
                <h1><strong>Organization</strong></h1>
                  <h3>Name : <strong><?= $org_data['org_name']; ?></strong></h3>
                  <h4>Category : <strong><?= $org_data['org_type']; ?></strong></h4>
                  
                  <img src="../assets/org_data/<?= $org_data['org_image']; ?>" class="center-block img-thumbnail img-responsive"/>                                  
              </div>
            </div>
    </div>
  </div>
</div>

  <?php include '../footer.php'; ?>

</body>

</html>