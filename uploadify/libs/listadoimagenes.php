<?php
	include("mysql.inc.php");
	
	$db = new MySQL();
	$listar= $db ->consulta("SELECT * FROM tbl_temp_files");

if($db->num_rows($listar)>0){
	echo"<table class='demoTable'>";
	echo"<caption>LISTA DE ARCHIVOS</caption>";
		echo"<tr>";
			echo "<th width=\"40\">Estado</th>";
			echo "<th>Descripcion</th>";
			echo "<th width=\"70\" align=\"center\">Vista</th>";
			echo "<th align=\"center\">Opciones</th>";
		echo"</tr>";
			while($row=($db->fetch_array($listar))){
				echo"<tr>";
					if($row['status']==1){
						echo"<td align=\"center\"><img src='images/001_18.png' width='20'></td>";
					}else{
						echo"<td><img src='images/001_19.png' width='20'></td>";
					}
				echo"<td>".$row['descripcion']."</td>";
					switch ($row['tipo']) {
						case 'pdf':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/pdf.png' width='70' height='70'></a></td>";
							break;
						case 'docx':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/doc.png' width='70' height='70'></a></td>";
							break;
						case 'xlsx':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/xls.png' width='70' height='70'></a></td>";
							break;
						case 'html':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/html.png' width='70' height='70'></a></td>";
							break;
						case 'txt':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/txt.png' width='70' height='70'></a></td>";
							break;
						case 'zip':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='images/zip.png' width='70' height='70'></a></td>";
							break;
								
						default:
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='uploads/".$row['nombre']."' width='70' height='70'></a></td>";
							break;
					}
				echo "<td width=\"20\" align=\"center\"><a href=\"libs/borrar_archivo.php?id=".$row['id_files']."\"><img title=\"Borrar\" src=\"images/delete.png\"></a></td>";
				echo"</tr>";
			}
	echo"</table>";
}else{
	echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
}
?>