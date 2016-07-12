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

            <legend>Location Data</legend>

            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" id="place-input" class="form-control input-lg" placeholder="Search">
        </div>
        
      </form>

            		
    <div id="map"></div>
    <div id="right-panel">
      <div>Encoding:</div>
      <textarea style="    width: 100%;
    height: 100px;
    font-size: 2em;
" id="encoded-polyline" ></textarea>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&libraries=geometry,places&callback=initMap"
        async defer></script>
    <script>
      // This example requires the Geometry library. Include the libraries=geometry
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 9.951518529111583, lng: 76.62963112816215},
        });
        var poly = new google.maps.Polyline({
          strokeColor: '#000000',
          strokeOpacity: 1,
          strokeWeight: 3,
          map: map
        });

        var origin_input = document.getElementById('place-input');
        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.addListener('place_changed', function() 
        {
          var place = origin_autocomplete.getPlace();
          if (!place.geometry) 
            {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }


          origin_place_id = place.place_id;
          console.log(origin_place_id);
          console.log(place.formatted_address);
          gcode(origin_place_id);
        });

        // Add a listener for the click event
        google.maps.event.addListener(map, 'click', function(event) {
          addLatLngToPoly(event.latLng, poly);
        });
      }



function showmap(pid, lat, lng) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: lat, lng: lng },
            zoom: 15,
            draggable: true
        });

         var poly = new google.maps.Polyline({
          strokeColor: '#000000',
          strokeOpacity: 1,
          strokeWeight: 3,
          map: map
        });

        google.maps.event.addListener(map, 'click', function(event) {
          addLatLngToPoly(event.latLng, poly);
        });
    }


function gcode(pid) {
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'placeId': pid},
         function(results, status) {
            var lat = results[0].geometry.location.lat();
            var lng = results[0].geometry.location.lng();
            var cord = [lat, lng];

            showmap(pid, lat, lng);
     
            console.log(lat + "," + lng);
          });
    }

          

      function addLatLngToPoly(latLng, poly) {
        var path = poly.getPath();
        // Because path is an MVCArray, we can simply append a new coordinate
        // and it will automatically appear
        path.push(latLng);

        // Update the text field to display the polyline encodings
        var encodeString = google.maps.geometry.encoding.encodePath(path);
        if (encodeString) {
          document.getElementById('encoded-polyline').value = encodeString;
        }
      }
    </script>
    <script type="text/javascript">
      $(function(){
        $("form").submit(function(e){
                e.preventDefault();
            });
      });
    </script>
    
    

            </div>
		</div>
	</div>
</div>
	<?php include '../footer.php'; ?>

	
</body>
</html>