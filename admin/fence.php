
<!DOCTYPE html>
<html>
  <head>
    <title>Encoding methods</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <?php include('header.php'); ?>
    <meta charset="utf-8">
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 80%;
        width: 50%;
        float: left;
      }
      #right-panel {
        width: 46%;
        float: left;
      }
      #encoded-polyline {
        height: 100px;
        width: 100%;
      }
    </style>
  </head>
  <body>
  <header>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="about.html" target="">About <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Contact Us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Arun V.B</a></li>
            <li><a href="#">Dennis K Bijo</a></li>
            <li><a href="#">Johan varghese</a></li>
            <li><a href="#">Sebin Paul</a></li>
            <li role="separator" class="divider"></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Active Users</a></li>
            <li><a href="#">Recent Users</a></li>
            <li><a href="#">User locations</a></li>
            <li role="separator" class="divider"></li>

          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" id="place-input" class="form-control" placeholder="Search">
        </div>
        <button class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
       
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">
                Login via
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>
                                or
                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>
                    <div class="checkbox">
                       <label>
                       <input type="checkbox"> keep me logged-in
                       </label>
                    </div>
                 </form>
              </div>
              <div class="bottom text-center">
                New here ? <a href="#"><b>Join Us</b></a>
              </div>
           </div>
        </li>
      </ul>
        </li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
    <div id="map"></div>
    <div id="right-panel">
      <div>Encoding:</div>
      <textarea id="encoded-polyline"></textarea>
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
    
  </body>
</html>
