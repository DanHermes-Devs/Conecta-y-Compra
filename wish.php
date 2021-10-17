<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){

		header("Location: login");

	}

	include_once 'include/dbconnect.php';

	$uid2=$_SESSION['user'];



	$error = false;



	if ( isset($_POST['p']) ) {



		// clean user inputs to prevent sql injections

		$producto = trim($_POST['p']);

		$user = trim($_POST['u']);

		$tienda = trim($_POST['t']);

		$action = trim($_POST['a']);



		// basic name validation

		if (empty($producto)) {

			$error = true;

			$errMSG = "<div class='errormsg'>Ups, ocurrió un problema. Inténtalo de nuevo o recarga la página.</div>";

		}

		





		

		// if there's no error, continue to signup

		if( !$error ) {

			

			if($action == "a"){

				$query = "INSERT INTO wishlist (id_usuario, id_producto, id_tienda, activo) VALUES ($user, $producto, $tienda, 1)";

				$res = mysqli_query($conn, $query);

			}

			

			if($action == "d"){

				$query = "DELETE FROM wishlist WHERE id_usuario = $user AND id_producto = $producto";

				$res = mysqli_query($conn, $query);

			}

			

			

				

			

				

		}

		

		echo $errMSG;

		

		

	}

?>