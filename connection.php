<?php
$servername="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="root"; //replace with database password 
$dbname="geo";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}
//echo "sucess";
?>