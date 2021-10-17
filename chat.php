<?php 

ob_start();
session_start();

require_once 'dbconnect.php';


$nombre = $_POST["nombre"];
$mensaje = $_POST["mensaje"];

$cons2 = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
$ejecutarSQL2 = mysqli_query ($conn, $cons2);

