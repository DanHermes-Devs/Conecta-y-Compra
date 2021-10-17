<?php



include_once '../dbconnect.php';





$resultado = mysqli_query($conn, "SELECT * FROM mensajes ORDER BY id_mensaje ASC");

$numero_filas = mysqli_num_rows($resultado);





if($numero_filas> 0){

	

			while($row1= mysqli_fetch_array($resultado)){

							 

				echo '<div class="mensaje-1 msg'.$row1['id_usuario'].'">

				<h3>'.$row1['nombre'].'</h3>

				<p>'.$row1['mensaje'].'</p>

				<h4>'.$row1['fecha'].'</h4>

				

				</div>';

								//echo '<p>'.$row['id_usuario'].'</p><br><br>';



			}

	

	

}



else{

	

	echo "<div style='width:100%; padding:5%;'>NO HAY MENSAJES</div>";

}









?>





