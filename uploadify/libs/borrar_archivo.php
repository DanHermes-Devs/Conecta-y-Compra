<?php
	include("mysql.inc.php");
	if (!empty($_GET['id'])) {
		$db = new MySQL();
			$id_archivo = $_GET['id'];
			$dir = "../uploads/";
			
			//Borrar archivo del servidor
				$consult=$db->consulta("SELECT * FROM tbl_temp_files WHERE id_files=".$id_archivo."");
				if ($row=$db->fetch_array($consult)) {
					unlink($dir.$row['nombre']);
					$borrar = $db->consulta("DELETE FROM tbl_temp_files WHERE id_files=".$id_archivo."");
					if ($borrar) {
						echo '<script>window.alert("El archivo a sido borrado con exito!");location.href="../index.php";</script>';
					}else {
					echo '<script>window.alert("Error al borrar el archivo");location.href="../index.php";</script>';
					}
				}
	} else {
		echo "No existe el archivo";
	}
?>