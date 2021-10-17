<?php
	ob_start();
	session_start();
	include_once 'dbconnect.php';

	if(isset($_SESSION['user']) && isset($_GET['idTarjeta'])){
		$tarjeta = $_GET["idTarjeta"];
		$sql = "DELETE FROM tarjetas WHERE id_tarjeta = $tarjeta";
		$borrar = mysqli_query($conn, $sql);
	}

	header("Location: cuenta");

	

?>
