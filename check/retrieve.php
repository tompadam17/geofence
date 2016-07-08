<pre><?php

$mysqli = new mysqli('localhost', 'root', 'root', 'geo');

$query = "SELECT * FROM status ORDER BY id DESC LIMIT 1";

if ($query = $mysqli->query($query)) {
	$row = $query->fetch_assoc();
	 $data[] = $row;
	echo json_encode($data);
}