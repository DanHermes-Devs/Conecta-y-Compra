<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){

		header("Location: login");

	}

	include_once '../include/dbconnect.php';

	$uid2=$_SESSION['user'];



	$error = false;



	if ( isset($_POST['resumendata']) ) {



		// clean user inputs to prevent sql injections

		$resumen = urldecode($_POST['resumendata']);



		

		$id_tienda = trim($_POST['id_tienda']);



	

		

		// basic name validation

		if (empty($resumen)) {

			$error = true;

			$errMSG = "<div class='errormsg'>Ingresa tu resumen.</div>";

		}

		





		

		// if there's no error, continue to signup

		if( !$error ) {

			

			$query = "UPDATE tiendas SET resumen_servicios = '$resumen' WHERE id_tienda = $id_tienda";

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