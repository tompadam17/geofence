<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Geofence.in</title>

    <!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
      <a class="navbar-brand" href="#">Geo Fencing</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<style type="text/css">
  .center-block
  {
    float: none;
  }
  .padding
  {
    padding: 1%;
  }
  /*
Fade content bs-carousel with hero headers
Code snippet by maridlcrmn (Follow me on Twitter @maridlcrmn) for Bootsnipp.com
Image credits: unsplash.com
*/

/********************************/
/*       Fade Bs-carousel       */
/********************************/
.fade-carousel {
    position: relative;
    height: 50vh;
}
.fade-carousel .carousel-inner .item {
    height: 50vh;
}
.fade-carousel .carousel-indicators > li {
    margin: 0 2px;
    background-color: #f39c12;
    border-color: #f39c12;
    opacity: .7;
}
.fade-carousel .carousel-indicators > li.active {
  width: 10px;
  height: 10px;
  opacity: 1;
}

/********************************/
/*          Hero Headers        */
/********************************/
.hero {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 1px 1px 0 rgba(0,0,0,.75);
      -webkit-transform: translate3d(-50%,-50%,0);
         -moz-transform: translate3d(-50%,-50%,0);
          -ms-transform: translate3d(-50%,-50%,0);
           -o-transform: translate3d(-50%,-50%,0);
              transform: translate3d(-50%,-50%,0);
}
.hero h1 {
    font-size: 6em;    
    font-weight: bold;
    margin: 0;
    padding: 0;
    text-shadow: 2px 2px 2px black;
}

.fade-carousel .carousel-inner .item .hero {
    opacity: 0;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s; 
}
.fade-carousel .carousel-inner .item.active .hero {
    opacity: 1;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s;    
}

/********************************/
/*            Overlay           */
/********************************/
.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: rgba(8, 13, 21, 0.25);
    opacity: .3;
}

/********************************/
/*          Custom Buttons      */
/********************************/
.btn.btn-lg {padding: 10px 40px;}
.btn.btn-hero,
.btn.btn-hero:hover,
.btn.btn-hero:focus {
    color: #f5f5f5;
    background-color: #1abc9c;
    border-color: #1abc9c;
    outline: none;
    margin: 20px auto;
}

/********************************/
/*       Slides backgrounds     */
/********************************/
.fade-carousel .slides .slide-1, 
.fade-carousel .slides .slide-2,
.fade-carousel .slides .slide-3 {
  height: 50vh;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.fade-carousel .slides .slide-1 {
  background-image: url(assets/images/banner.png); 
}
.fade-carousel .slides .slide-2 {
  background-image: url(assets/images/gpss.jpg);
}
.fade-carousel .slides .slide-3 {
  background-image: url(assets/images/b2.png);
}

/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
    .hero { width: 980px; }    
}
@media screen and (max-width: 640px){
    .hero h1 { font-size: 4em; }    
}
  /*--------*/
 /*  LOGIN */
/*--------*/
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
body {
    background-color: #f9f9f9 !important;
    font-family: 'Open Sans', sans-serif!important;
    font-size:11px;
}
.well{
    background-color:#fff!important;
    border-radius:0!important;
    border:black solid 1px;
}

.well.login-box {
    /*width:400px; */
    border:#d1d1d1 solid 1px;
    margin:0 auto;
    margin-top:30px;
}
.well.login-box legend {
  font-size:26px;
  text-align:center;
  font-weight:300;
}
.well.login-box label {
  font-weight:300;
  font-size:13px;
  
}
.well.login-box input[type="text"] {
  box-shadow:none;
  border-color:#ddd;
  border-radius:0;
}

.well.welcome-text{
    font-size:21px;
}

/* Notifications */

.notification{
    position:fixed;
    top: 20px;
    right:0;
    background-color:#FF4136;
    padding: 20px;
    color: #fff;
    font-size:21px;
    display:none;
}
.notification-success{
  background-color:#3D9970;
}

.notification-show{
    display:block!important;
}

/*Loged in*/
.btn-default {
    color: #333;
    background-color: #f9f9f9;
    border-color: #ccc;
    border: 1px solid;
    text-align: center;
    cursor: pointer;
    color: #5e5e5e;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fefefe), color-stop(100%, #f9f9f9)), #f9f9f9;
    background: -moz-linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    background: -webkit-linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    background: linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    border-color: #c3c3c3 #c3c3c3 #bebebe;
    -moz-box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
    -webkit-box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
    box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
}
</style>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<div class="container-fluid">
	<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
		  <!-- Overlay -->
		  <div class="overlay"></div>

		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
		    <li data-target="#bs-carousel" data-slide-to="1"></li>
		    <li data-target="#bs-carousel" data-slide-to="2"></li>
		  </ol>
		  
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item slides active">
		      <div class="slide-1"></div>
		      <div class="hero">
		        <hgroup>                 
		            <h1>GEO LOCATION AND GEO FENCING SYSTEM</h1>
		        </hgroup>        
		      </div>
		    </div>
		    <div class="item slides">
		      <div class="slide-2"></div>
		      <div class="hero">        
		        <hgroup>
		            <h1>Location Tracking</h1>                    
		        </hgroup>               
		      </div>
		    </div>
		    <div class="item slides">
		      <div class="slide-3"></div>
		      <div class="hero">        
		        <hgroup>
		            <h1>Live Update</h1>    
		            <h3>Get live updates on your smartphone</h3>                
		        </hgroup>        
		      </div>
		    </div>
		  </div> 
	</div>
</div>
<div class="padding"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 center-block">	    
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Login</h4>
				</div>	
			 	<div class="panel-body">			        
			            <div class="row">
			            	<div class="col-md-1"></div>
			                <div class="col-md-4">
			                    <div class="panel panel-danger">
			                        <div class="panel-heading">
			                            <h4>Admin Login</h>
			                        </div>
			                        <div class="panel-body">
			                            <div class="login-box">
			                                <form action="admin/login.php" method="POST">			                                    
			                                    <div class="form-group">
			                                        <label for="username-email">
			                                        Username</label> <input class=
			                                        "form-control" id="username-email"
			                                        placeholder="E-mail or Username" type=
			                                        "text" name="uname" value=''>
			                                    </div>
			                                    <div class="form-group">
			                                        <label for="password">Password</label>
			                                        <input class="form-control" id=
			                                        "password" placeholder="Password" name="password" type=
			                                        "password" value=''>
			                                    </div>
			                                    <div class="input-group">
			                                        <div class="checkbox">
			                                            <label><input id="login-remember"
			                                            name="remember" type="checkbox"
			                                            value="1"> Remember me</label>
			                                        </div>
			                                    </div>
			                                    <div class="form-group">
			                                        <input class=
			                                        "btn btn-default btn-login-submit btn-block m-t-md"
			                                        type="submit" value="Login">
			                                    </div>
			                                </form>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <div class="col-md-2"></div>
				            <div class="col-md-4">
				                <div class="panel panel-success">
				                    <div class="panel-heading">
				                        <h4>Student Login</h4>
				                    </div>
				                    <div class="panel-body">
				                        <div class="login-box">
				                            <form action="student/login.php" method="POST">				                                
				                                <div class="form-group">
				                                    <label for="username-email">Username</label> <input class=
				                                    "form-control" id="username-email"
				                                    placeholder="E-mail or Username" name="uname" type=
				                                    "text" value=''>
				                                </div>
				                                <div class="form-group">
				                                    <label for="password">Password</label>
				                                    <input class="form-control" id="password"
				                                    placeholder="Password" name="password" type="password" value=
				                                    ''>
				                                </div>				                                
				                                <div class="form-group">
				                                    <input class=
				                                    "btn btn-default btn-login-submit btn-block m-t-md"
				                                    type="submit" value="Login">
				                                </div>
				                                <div class="form-group">
				                                    <p class="text-center m-t-xs text-sm">Do
				                                    not have an account?</p><a class=
				                                    "btn btn-info btn-block m-t-md" href="register.php">Create an account</a>
				                                </div>
				                            </form>
				                        </div>
				                    </div>
				                </div>
				            </div>
			            </div>
		        </div>
		    </div>
	    </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>



