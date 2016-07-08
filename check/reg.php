<?PHP
header("Access-Control-Allow-Origin: *");

    include_once("connection.php");

if(isset($_POST['username']) && isset($_POST['password'])){
   
    $i = $_POST['username'];
    $j = $_POST['password'];
   

    $query = "INSERT INTO student(username,password) 
    VALUES ('$i','$j')"; 
    
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
<head> <title>Android</title>

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
                <td><input type="text" name="username"  placeholder="myusername or mymail@mail.com" required /></td>
                </tr>
                <tr>
                <td colspan="1" width="200px" align="center" >password</td>
                <td> <input name="password" required="required" type="password" placeholder="eg. X8df!90EO" required /></td>
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