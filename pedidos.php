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
@media(max-width:800px){
	.table-container {
	width: 100%;
	overflow-x: scroll;
}
}
</style>

    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; margin-top:100px;">
		   
		   <div class="container">

		   <h1 class="h1cuenta">MIS PEDIDOS</h1>
		   
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
<td align='center'><b>Productos</b></th>
<td align='center'><b>Total</b></th>
<td align='center'><b>Fecha de compra</b></th>
<td align='center'><b>Método de pago</b></th>
<td align='center' style="max-width: 100px;"><b>Estatus</b></th>

<td align='center' style="max-width: 100px;"><b></b></th>

</tr> 
</thead>  
<tbody>  
<?php  
$rown = 1;
if ($rown = 1) {  
?>  
             <tr> 
			
			<td  style="max-width: 100px; padding:0;"> <img src="img/order.png" style="width:80px;"></td> 
			<td>Audífonos JBL</td>
            <td>$400.00</td>  
			<td>21/06/2018 11:09pm</td>  
			<td>Paypal</td> 
			<td>Entregado</td> 
			<td><td  style="max-width: 100px; padding:0;"> <a data-balloon='Ayuda con este pedido' data-balloon-pos='up'  href="contacto.php" ><img src="img/ayudaorder.png" style="width:50px;"></a></td> </td> 
			 
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