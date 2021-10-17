<?php

	ob_start();

	session_start();

	if( isset($_SESSION['user'])){

		$owner = true;

	}

	include_once '../dbconnect.php';



	$banner = $_POST['banner'];

	$tienda = $_POST['idtienda'];

		function GetImageExtension($imagetype)

   	 {

       if(empty($imagetype)) return false;

       switch($imagetype)

       {

           case 'image/bmp': return '.bmp';

           case 'image/jpeg': return '.jpg';

           case 'image/png': return '.png';

           default: return false;

       }

     }







if (!empty($_FILES["uploadedimage"]["name"])) {



	$file_name=$_FILES["uploadedimage"]["name"];

	$temp_name=$_FILES["uploadedimage"]["tmp_name"];

	$imgtype=$_FILES["uploadedimage"]["type"];

	$ext= GetImageExtension($imgtype);

	$imagename=date("d-m-Y")."-".time().$ext;

	$target_path = "uploads/".$imagename;





if(move_uploaded_file($temp_name, $target_path)) {





	$ip = getenv('HTTP_CLIENT_IP')?:

	getenv('HTTP_X_FORWARDED_FOR')?:

	getenv('HTTP_X_FORWARDED')?:

	getenv('HTTP_FORWARDED_FOR')?:

	getenv('HTTP_FORWARDED')?:

	getenv('REMOTE_ADDR');



	$agent = mysqli_real_escape_string($_SERVER['HTTP_USER_AGENT']);



	$finish_time = time();



	$texto_finish= date("d/m/y h:i:s a", $finish_time);



	$rutaimg ="'".$target_path."'";



 	//$query_upload="INSERT into 'images_tbl' ('images_path','submission_date') VALUES ('".$target_path."','".date("Y-m-d")."')";

	$query_upload="INSERT INTO banners(imagen,  fecha, browser, ip, id_tienda, banner, activo) VALUES ('" .$target_path. "', '" .$texto_finish. "', '" .$agent. "', '" .$ip. "',' .$tienda. ','".$banner."', 1)";

	mysqli_query($conn, $query_upload) or die("error in $query_upload == ----> ".mysqli_error());



	//$query_upload="INSERT into 'images_tbl' ('images_path','submission_date') VALUES ('".$target_path."','".date("Y-m-d")."')";

	$query_update="UPDATE tiendas SET $banner = $rutaimg WHERE id_tienda = $tienda";

	mysqli_query($conn, $query_update) or die("error in $query_update == ----> ".mysqli_error());



	echo "<span style='color: #71D16B;

font-weight: 600;'>Imagen actualizada correctamente. <br>Recarga la página para ver el resultado.</span><br><br>



	<button  onClick='window.location.reload()'   class='btn btn-primary btn-round buttonreg'>Recargar página</button>

";



}else{

	echo "<span>No se pudieron guardar los datos, por favor intenta más tarde</span>";

   exit("Error al cargar la imagen");

}



}









?>

