<?php
$host = "localhost";
$userName = "sgillen7_admin";
$password = "Test123";
$database = "sgillen7_registration";

$con = mysqli_connect($host, $userName, $password, $database);

if ($con == false)
	echo "<p>Error connecting to " . $database . "</p>";

?>
