<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?PHP
    include_once("connection.php");

   $uname = $_GET['u'];
    $i = $_GET['lat'];
    $j = $_GET['lo'];

      
      $sql = "SELECT * FROM student WHERE username = '$uname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      #$active = $row['active'];

      $org_id =  $row['org_id'];
      $sql2 = "SELECT * FROM org WHERE org_id = '$org_id'";

      $result2 = mysqli_query($db,$sql2);
      $org_data = mysqli_fetch_array($result2,MYSQLI_ASSOC);
   
      $count = mysqli_num_rows($result);
      echo ' <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&signed_in=true&libraries=geometry,places"></script>
         <script>
    $(document).ready(function() {
          var pos = new google.maps.LatLng('.$_GET['lat'].','.$_GET['lo'].');
          var cord = google.maps.geometry.encoding.decodePath(\''.$org_data['org_location'].'\');
          var VJC = new google.maps.Polygon({paths: cord});
          var response = google.maps.geometry.poly.containsLocation(pos, VJC);
          if(response===true){
              $(".result").html("{\"status\" : \"inside\"}");
              console.log("HELLO");
              $.ajax({
                  type: "POST",
                  url: "j.php",
                  data: {
                      status: "inside",
                      lat:"'.$_GET['lat'].'",
                      lng:"'.$_GET['lo'].'",
                      uname:"'.$uname.'"
                  },
                  success: function (data) {
                      alert(data);

                  }
              });
            }
            else{
              console.log("LOL");
              $(".result").html("{\"status\" : \"outside\"}");
              $.ajax({
                  type: "POST",
                  url: "j.php",
                  data: {
                      status: "outside",
                      lat:"'.$_GET['lat'].'",
                      lng:"'.$_GET['lo'].'",
                      uname:"'.$uname.'"
                  },
                  success: function (data) {
                      alert(data);

                  }
              });              
            }            
       }); 
</script>
';
    

   

    

?>
