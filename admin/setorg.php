<?php
   require_once("../secure/db.php");
   session_start();
  if(!isset($_SESSION['admin'])  OR  empty($_GET['uid']) OR empty($_GET['org_id'])){
      //header("location:login.php");
      die("Something went wrong");
   }

   else
   {
   	$org_id = $_GET['org_id'];
   	$uid = $_GET['uid'];

      $sql = "UPDATE student SET org_id = $org_id WHERE uid = $uid";
      $result = mysqli_query($db,$sql);      
     
     if($result)
     {
     	header("location:assign.php");
     	die();
     }
     else{
     	die("Something went wrong!");
     }

   }

?>
