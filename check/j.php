<?php

$mysqli = new mysqli('localhost', 'root', 'root', 'geo');

$status = $_POST['status'];
$uname = $_POST['uname'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$query = sprintf("INSERT INTO test(status,uname,lat,lng) VALUES ('%s', '%s', '%s', '%s')", $status, $uname, $lat, $lng);

if ($result = $mysqli->query($query)) {
	echo "inserted!";
} else {
	echo "NOT inserted";
	echo $mysqli->error;
}
?>