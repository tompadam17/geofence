<?PHP
header("Access-Control-Allow-Origin: *");

include_once("connection.php"); 
if(isset($_POST['tusername']) && isset($_POST['tpassword'])){
    
    $username = $_POST['tusername'];
    $password = $_POST['tpassword'];
    $query = "SELECT * FROM student WHERE username = '$username' 
        AND password = '$password'";

    $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){ //has record. correct username and password
       // header("Location: content.html");
        echo "success";
        exit;
    }
    else{
        echo "Wrong username and password"; 
        exit;
    }
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

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
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

<body>

    <div class="container">

      <form action="<?PHP $_PHP_SELF ?>" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="tusername" id="inputEmail" value="" class="form-control" placeholder="username" required autofocus/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="tpassword" value="" id="inputPassword" class="form-control" placeholder="Password" required/>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
    
</body>
</html>