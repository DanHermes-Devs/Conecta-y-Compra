<?php
	ob_start();
	session_start();
	include_once 'dbconnect.php';

	if(isset($_SESSION['user']) && isset($_GET['id'])){
		$direccion = $_GET["id"];
		$sql = "DELETE FROM tarjetas WHERE id_direccion = $direccion";
		$borrar = mysqli_query($conn, $sql);
	}

	header("Location: cuenta");

	

?>
