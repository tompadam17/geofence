
<?PHP
header("Access-Control-Allow-Origin: *");

   include_once("connection.php"); 


   $a=$_GET['un'];
    $i = $_GET['lp'];
    $j = $_GET['lg'];
  

       $sql1 = "SELECT * FROM student WHERE username = '$a'";
       $result2 = mysqli_query($conn,$sql1);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);

      $org_id =  $org_data['org_id'];
      $sql2 = "SELECT * FROM org WHERE org_id = '$org_id'";

      $result2 = mysqli_query($conn,$sql2);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      #var_dump($result2);
      $loc = $org_data['org_location'];
      $uri = "http://geofence.in/api.php?lat=$i&lng=$j&loc=$loc";

      #echo $uri;

      #die();

      $status = file_get_contents("http://geofence.in/api.php?lat=$i&lng=$j&loc=$loc");
   
      $count = mysqli_num_rows($result);
      echo ' success';

//$status = $_GET['status'];


    $query = "INSERT INTO data(username,lattitude,longitude,status) 
    VALUES ('$a','$i','$j','$status')"; 
    
    $result = mysqli_query($conn, $query);

    $status_query = "INSERT INTO status(status,uname,lat,lng) VALUES ('$status','$a','$i','$j')"; 

    $result2 = mysqli_query($conn, $status_query);




    

?>
