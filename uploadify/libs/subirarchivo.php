<?php
//archivo que contiene la conexion
include("mysql.inc.php");
try{
	$db = new MySQL();
	$arrayreempla=array("/","");
	
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$archivo= str_replace($arrayreempla," ", $_FILES['Filedata']['name']);
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$type= explode(".", $archivo);
	$extension = end($type);
	$imagen= time(). "-" . $archivo;
	$descrip= $_REQUEST['des'];
	$targetFile = str_replace("//", "/", $targetPath) . $imagen;
	
	$insert = $db->consulta("INSERT INTO `tbl_temp_files` (`id_files`, `nombre` , `descripcion` , `tipo`, `status` )VALUES('NULL','$imagen','$descrip','$extension','1')");
	
		if ($insert){
			echo "1";
			move_uploaded_file($tempFile, $targetFile);
		}else{
			echo "0";
		}
	} 
	catch (Exception $ex) 
	{
	echo "0";
}
?>