<?php



include_once '../dbconnect.php';







	if ( isset($_POST['name']) ) {

	



		// clean user inputs to prevent sql injections

		

		$nombre = trim($_POST['name']);

		$nombre = strip_tags($nombre);

		$nombre = htmlspecialchars($nombre);



		



		$mensaje = trim($_POST['msg']);

		$mensaje = strip_tags($mensaje);

		$mensaje = htmlspecialchars($mensaje);

		

		

		$user = trim($_POST['user']);

		$user = strip_tags($user);

		$user = htmlspecialchars($user);



		date_default_timezone_set('America/Mexico_City');



		$finish_time = time();



		$fecha= date("d/m/y h:i:s a", $finish_time);

		



				



				$query = "INSERT INTO mensajes (nombre, mensaje, id_usuario, fecha) VALUES('$nombre', '$mensaje', $user, '$fecha')";



					$res =mysqli_query($conn, $query) or die("Falló la consulta $query");



					if($res){

						//echo "<div class='success'>Domicilio Actualizado</div>";

						//echo "<script>window.location.href = 'domicilio3?r=".$linkrappi."&cp=".$cp."';</script>";

						//echo "<div class='success'>Domicilio actualizado...</div>";	

					}



					else {



						echo "<div class='errormsg'>Ocurrió un error, por favor intenta nuevamente más tarde...</div>";	



					}









	}







else{



echo "spam";



}







?>





