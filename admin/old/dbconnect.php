<?php
$servername = "127.0.0.1";
$username = "conectaycompra";
$password = "conectaycompra@2017";
$dbname = "conectaycompra";
	
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$mysqli->set_charset("utf8");

?>
