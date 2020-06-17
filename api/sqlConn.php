<?php
$hostname = "localhost";
$username = "id11556116_tcnr108b15";
$password = "id11556116_friends";
$dbname = "id11556116_friends";

$con = new mysqli($hostname, $username, $password, $dbname);
// if(mysqli_connect_errno()) echo "Connection Failed: ".$con->connect_error;

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}

$con->query("SET NAMES UTF8");
?> 