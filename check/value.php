<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?PHP
header("Access-Control-Allow-Origin: *");

    include_once("connection.php");

if( isset($_POST['username']) &&  isset($_POST['lattitude']) && isset($_POST['longitude']) && isset($_POST['status']) ){
   $a=$_POST['username'];
    $i = $_POST['lattitude'];
    $j = $_POST['longitude'];
     $f = $_POST['status'];

      $uname = $_POST['username'];
      $sql = "SELECT * FROM student WHERE username = '$uname'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      #$active = $row['active'];

      $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM org WHERE org_id = '$org_id'";

      $result2 = mysqli_query($conn,$sql2);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      #print_r($result2);
   
      $count = mysqli_num_rows($result);
      echo ' <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&signed_in=true&libraries=geometry,places"></script>
         <script>
    $(document).ready(function() {
          var pos = new google.maps.LatLng('.$_POST['lattitude'].','.$_POST['longitude'].');
          var cord = google.maps.geometry.encoding.decodePath(\''.$org_data['org_location'].'\');
          var VJC = new google.maps.Polygon({paths: cord});
          var response = google.maps.geometry.poly.containsLocation(pos, VJC);
          console.log(response);
          if(response===true){
              $(".result").html("{\"status\" : \"inside\"}");
              console.log("HELLO");
              $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                      status: "inside",
                      lat:"'.$_POST['lattitude'].'",
                      lng:"'.$_POST['longitude'].'",
                      uname:"'.$uname.'"
                  },
                  success: function (data) {
                      console.log("success");

                  }
              });
            }
            else{
              console.log("LOL");
              $(".result").html("{\"status\" : \"outside\"}");
              $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                      status: "outside",
                      lat:"'.$_POST['lattitude'].'",
                      lng:"'.$_POST['longitude'].'",
                      uname:"'.$uname.'"
                  },
                  success: function (data) {
                      console.log("success");

                  }
              });              
            }            
       }); 
</script>
';
    

    $query = "INSERT INTO data(username,lattitude,longitude,status) 
    VALUES ('$a','$i','$j','$f')"; 
    
    $result = mysqli_query($conn, $query);

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
<html>
<head> <title>Gps Tracker</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="s.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="admin.css"></head>
    <body>
         <div class="container">


 
          <div class="row">
        <form action="<?PHP $_PHP_SELF ?>" method="post">
            <br>
            <br>
            <br>
            <div class="table-responsive">
            
            <table class="table"  align="center">
                <tr>
                <br>
                <br>
                <td colspan="1" width="200px" align="center" >Username</td>
                <td><input type="text" name="username"   /></td>
                </tr>
                <tr>
                <td colspan="1" width="200px" align="center" >lattitude</td>
                <td> <input type="text" name="lattitude"  /></td>
                </tr>
                <tr>
                 <td colspan="1" width="200px" align="center" >longitude</td>
                 <td> <input type="text" name="longitude"  /></td>
                 </tr>
                    <tr>
                 <td colspan="1" width="200px" align="center" >status</td>
                 <td> <input type="text" name="status"  /></td>
                 </tr>
                  
                  <br>
                  <br>
                  <tr>
                      <td colspan="1" width="200px" align="center" ><input type="submit" value="Submit" name="sub" class="btn btn-lg btn-primary"/></td>
                  </tr>
            </table>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>