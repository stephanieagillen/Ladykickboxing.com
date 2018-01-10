<?php
$host = "localhost";
$userName = "sgillen7_test";
$password = "Tset123";
$database = "sgillen7_registration";

$con = mysql_connect($host, $userName, $password, $database);

if ($con == false)
	echo "<p>Error connecting to " . $database . "</p>";

?>
