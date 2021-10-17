<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){

		header("Location: login");

	}

	include_once '../include/dbconnect.php';

	$uid2=$_SESSION['user'];



	$error = false;



	if ( isset($_POST['detallesdata']) ) {



		// clean user inputs to prevent sql injections

		$detalles = urldecode($_POST['detallesdata']);



		

		$id_tienda = trim($_POST['id_tienda']);



	

		

		// basic name validation

		if (empty($detalles)) {

			$error = true;

			$errMSG = "<div class='errormsg'>Ingresa los detalles.</div>";

		}

		





		

		// if there's no error, continue to signup

		if( !$error ) {

			

			$query = "UPDATE tiendas SET detalles_servicios = '$detalles' WHERE id_tienda = $id_tienda";

			$res = mysqli_query($conn, $query);

				

			if ($res) {

				$errTyp = "success";

				$errMSG = "<div class='sucessmsg'>Información guardada con éxito.</div>";

	

			} else {

				$errTyp = "danger";

				$errMSG = "<div class='errormsg'>Ocurrió un error, por favor intenta nuevamente más tarde...<br>".$query."</div>";	

			}	

				

		}

		

		echo $errMSG;

		

		

	}

?>