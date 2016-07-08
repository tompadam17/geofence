<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="temp.css">
<style type="text/css">
    #map {
        float: none;
        margin: 0 auto;
        height: 600px;
        width:100%;
      }
</style>

	<title>Mini Project</title>
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
        <button type="submit" class="btn btn-default">Submit</button>
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
      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Menu
                    </a>
                </li>
                <li>
                    <a href="">Home</a>
                </li>
                
                
                
                    
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Team <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Developers</li>
                    
                    <li><a href="http://fb.me/arun.v.babu" target="_blank">Arun V.B</a></li>
                    <li><a href="http://fb.me/DennisKBijo" target="_blank">Dennis K Bijo</a></li>
                    <li><a href="#">Sebin Paul</a></li>
                    <li><a href="http://fb.me/johanrocksu" target="_blank">Johan Varghese</a></li>
                    
                  </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMtYmJp8Hhtxn-6TVi0U4y_Mh_HW6tCS0&signed_in=true&libraries=geometry,places&callback=initMap"
         async defer></script>
         <script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 9.951518529111583, lng: 76.62963112816215},
    zoom: 17,
  });

  var triangleCoords = [
{lat : 9.951607939325209 ,lng : 76.62915989756584 },
{lat : 9.95084997440219 ,lng : 76.63002222776413 },
{lat : 9.95059635585848 ,lng : 76.6313311457634 },
{lat : 9.950532951191768 ,lng : 76.63226455450058 },
{lat : 9.951346643479768 ,lng : 76.63173884153366 },
{lat : 9.95165309849122 ,lng : 76.63070887327194 },
{lat : 9.951748205160428 ,lng : 76.62985056638718 }

  ];

  var cord = google.maps.geometry.encoding.decodePath('{rv{@qsurMtBkEt@eE@eB@kB]]i@n@}AhAm@|AUpBUlBJ|A?lALnAp@m@');

var origin_input = document.getElementById('place-input');
  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
  origin_autocomplete.addListener('place_changed', function() {
  var place = origin_autocomplete.getPlace();
  if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
  }

  origin_place_id = place.place_id;
  console.log(origin_place_id);
  console.log(place.formatted_address);
  gcode(origin_place_id);

});

  var VJC = new google.maps.Polygon({paths: cord});

  google.maps.event.addListener(map, 'click', function(e) {
    var resultColor =
        google.maps.geometry.poly.containsLocation(e.latLng, VJC) ?
        alert("User inside") :
        alert("User outside");

        console.log(e.latLng);

    new google.maps.Marker({
      position: e.latLng,
      map: map,
      icon: {
        path: google.maps.SymbolPath.CIRCLE,
        fillColor: resultColor,
        fillOpacity: .2,
        strokeColor: 'white',
        strokeWeight: .5,
        scale: 10
      }
    });
  });


}

function showmap(pid, lat, lng) {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: lat, lng: lng },
        zoom: 15,
        draggable: true
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


    </script>
        
    <script type="text/javascript">
      $(document).ready(function () {
          var trigger = $('.hamburger'),
              overlay = $('.overlay'),
             isClosed = false;

            trigger.click(function () {
              hamburger_cross();      
            });

            function hamburger_cross() {

              if (isClosed == true) {          
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
              } else {   
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
              }
          }
          
          $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
          });  
        });
    </script>
    

</body>
</html>	

<!-- {rv{@qsurMtBkEt@eE@eB@kB]]i@n@}AhAm@|AUpBUlBJ|A?lALnAp@m@ -->