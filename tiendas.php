<?php
	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		header("Location: login.php");
	}
	$uid=$_SESSION['user'];
	include_once 'dbconnect.php';

	require_once 'include/header.php';
?>

<style>

.addproduct {
	position: fixed;
	width: 40px;
	height: 40px;
	z-index: 99;
	right: 10%;
	top: 200px;
}
.addproduct img{width:100%; transition:.35s all ease;}
.addproduct:hover >img{padding:4%; transition:.35s all ease;}

@media(max-width:800px){
	.h1cuenta {	
	margin-top: 0;
}

.addproduct {
	position: relative;
	width: 40px;
	height: 40px;
	z-index: 99;
	right: 0;
	top: 0;
	/* max-width: 30px; */
	display: inline-block;
}
.addproduct img {
	width: 100%;
	transition: .35s all ease;
	min-width: 10px;
	max-width: 100%;
}
.table-container {
	max-width: 115%;
	overflow-x: scroll;
}
}
</style>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; margin-top:100px;">
		   
		   <div class="container">
<a data-balloon="Nueva tienda" data-balloon-pos="up" class="addproduct" href="crea-tienda.php"><img src="/cyc/img/add.png"></a>
		   <h1 class="h1cuenta">MIS TIENDAS</h1>
			
		   
		   <div class="datagrid" id="datagrid">
		
		<?php
  
$sql = "SELECT * FROM tiendas  WHERE activo = 1 AND id_usuario='".$uid."'";  
$rs_result = mysqli_query ($conn, $sql);  
?>
 <div class="table-container">
 <table width="100%" style="text-align:center;"> 
<thead>  
<tr style="    color: #005B9C;
    font-size: 14px;
    text-transform: uppercase;">
<td align='center'  style="max-width: 50px;"></th>
<td align='center'><b>Nombre de la tienda</b></th>
<td align='center'><b>Descripción</b></th>
<td align='center'><b>Etiquetas</b></th>
<td align='center' style="max-width: 100px;"><b>Categoría</b></th>
<td align='center'><b>Teléfono</b></th>

<td align='center' style="max-width: 200px;"><b>Dirección</b></th>
<td align='center'></th>
</tr> 
</thead>  
<tbody>  
<?php  
while ($rown = mysqli_fetch_assoc($rs_result)) {  
?>  
             <tr> 
			
			<td  style="max-width: 50px; padding:0;"> <a data-balloon='Ver tienda' data-balloon-pos='up'  href="tienda/<?php echo $rown["url"]; ?>" ><img src="img/shop.png" style="width:30px;"></a></td> 
			<td><?php echo $rown["titulo"]; ?></td>
            <td><?php echo $rown["descripcion"]; ?></td>  
			<td><?php echo $rown["etiquetas"]; ?></td>  
			<td><?php echo $rown["categoria"]; ?></td> 
			<td><?php echo $rown["telefono"]; ?></td> 
			<td><?php echo $rown["direccion"]; ?></td> 
			 

			<td align='center'>
			<form data-balloon='Eliminar tienda' data-balloon-pos='up' name='formbtndel<?php echo $rown["id_tienda"]; ?>' id='formbtndel<?php echo $rown["id_tienda"]; ?>' onsubmit='return false' action='deletettienda.php?id=<?php echo $rown["id_tienda"]; ?>'  enctype='multipart/form-data' method='post'>
			 <input onclick='delTienda(this.id)'; type='image' id='btndel<?php echo $rown["id_tienda"]; ?>' src='img/delete.png' WIDTH='20px'  BORDER='0' ALT='Eliminar' style='width:20px; margin: 0 10px; cursor: pointer'>
			</form></td>
            </tr>   
<?php  
};  
?>  
</tbody>  
</table>  
</div>    
			
		</div>

		

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>