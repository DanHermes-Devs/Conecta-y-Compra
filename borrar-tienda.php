<?php
	ob_start();
	session_start();
	include_once 'dbconnect.php';

	if(isset($_SESSION['user']) && isset($_GET['idTienda'])){
		$tienda = $_GET["idTienda"];
		$sql = "DELETE FROM tiendas WHERE id_tienda = $tienda";
		$borrar = mysqli_query($conn, $sql);
	}

	header("Location: cuenta");

	

?>
