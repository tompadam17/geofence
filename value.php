
<?PHP
header("Access-Control-Allow-Origin: *");

   include_once("connection.php"); 

if( isset($_POST['username']) &&  isset($_POST['lattitude']) && isset($_POST['longitude']) ){
   $a=$_POST['username'];
    $i = $_POST['lattitude'];
    $j = $_POST['longitude'];
  

    $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM org WHERE org_id = '$org_id'";

      $result2 = mysqli_query($conn,$sql2);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      #print_r($result2);
      $loc = $org_data['org_location'];

      $status = file_get_contents("http://geofence.in/api.php?lat=$i&lng=$j&loc=$loc");
   
      $count = mysqli_num_rows($result);
      echo ' success';

//$status = $_POST['status'];


    $query = "INSERT INTO data(username,lattitude,longitude,status) 
    VALUES ('$a','$i','$j','$status')"; 
    
    $result = mysqli_query($conn, $query);

    $status_query = "INSERT INTO status(status,uname,lat,lng) VALUES ('$status','$a','$i','$j')"; 

    $result2 = mysqli_query($conn, $status_query);


    if($result > 0){
        if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
            echo "success";
            exit;
        }
        echo "Insert Successfully";   
    }
    else{
        if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
            echo "failed";
            exit;
        }
        echo "Something Error";   
    }
}
    

?>

        <form action="<?PHP $_PHP_SELF ?>" method="post">

                <td><input type="text" name="username"   /></td>
                <td colspan="1" width="200px" align="center" >password</td>
                <td> <input type="text" name="lattitude"  /></td>
                 <td colspan="1" width="200px" align="center" >password</td>
                 <td> <input type="text" name="longitude"  /></td>
                  <td colspan="1" width="200px" align="center" >status</td>
                 <td> <input type="text" name="status"  /></td>
                      <td colspan="1" width="200px" align="center" ><input type="submit" value="Submit" name="sub" class="btn btn-lg btn-primary"/></td>
        </form>
