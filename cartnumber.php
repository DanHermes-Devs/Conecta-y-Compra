<?php

	ob_start();

	session_start();

	if(isset($_COOKIE['persistIDcart']))

	{

		$usercartid =   $_COOKIE['persistIDcart'];

		session_start();

	   $_SESSION['cartuser'] = $usercartid;





	}

	if( !isset($_SESSION['cartuser'])){

		//header("Location: login.php");

	}

	



	include_once 'dbconnect.php';

	if(strlen($_SESSION['user'])>0 && strlen($_COOKIE['persistIDcart'])>0){

	$usercart = $_COOKIE['persistIDcart'];

	$userid = $_SESSION['user'];

	

	$queryu = "UPDATE cart SET id_usuario = '$userid' WHERE id_usuario = '$usercart'";

	$resultu = mysqli_query($conn, $queryu) or die("Falló la consulta $queryu");

	$_SESSION['cartuser'] = $userid;

	

	

	

}



?>

 <?php

			$iduserc = $_SESSION['cartuser'];

				$numero_filasc = 0;

				if(strlen($iduserc)>0){

					$suma = 0;

					$queryc = "SELECT *, COUNT(id_producto) as numprods FROM cart WHERE id_usuario = '$iduserc' GROUP BY id_producto";

					$resultc = mysqli_query($conn, $queryc) or die("Falló la consulta $queryw");

					$numero_filasc = mysqli_num_rows($resultc);

					

					

					while($rowc = mysqli_fetch_assoc($resultc)){

						$idprodc = $rowc['id_producto'];

						$cantidad = $rowc['numprods'];

						

						

						$query = "SELECT * FROM productos WHERE id_producto = $idprodc";

						$result = mysqli_query($conn, $query) or die("Falló la consulta $query");

						while($row = mysqli_fetch_assoc($result)){

						

						

						$suma += $cantidad;

						}

					

					

					}

					

					echo $suma;

					

				}

				

				

		   

		   ?>