<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>
<style>
@media(max-width:800px){
.pagecont img.imgstore {
	width: 100%;
}	
}

</style>

    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container" style="padding-top:50px;">

<div class="col-md-12 text-center">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">MEMBRESÍAS</h2>

				
	 <p style="font-weight:bold;">Para ser miembro necesitas lo siguiente:</p>

<p>				
- Productos o Servicios a promocionar<br>
- Nombre de Tu empresa<br>
- Contacto<br>
- Ubicación<br>
- Datos Generales<br>
- Pago Anual para contar con tu tienda virtual y publicidad general.
</p>

<div class="col-md-6 text-left">

<h3 class="h3int">¿QUÉ INCLUYE LA MEMBRESIA CONECTA Y COMPRA ARTÍCULOS?</h3>
	
				<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>

<p>
<b>ARTICULOS</b><br>
• Membresía anual <br>
• Publicidad en redes sociales generalizadas <br>
• Tú tienda virtual( micrositio)<br>
• Chat de soporte para que atendamos las necesidades de tus clientes <br>
• Clave personalizada de ingreso<br>
• Uso ilimitado de productos( podrás subir y bajar tus productos como más se adecue a tu venta)*<br>
• Manejo de tus propios datos<br>
• Comunicación directa con tus clientes<br>
• Chat grupo conecta y compra <br>
• Interacción con todos los del grupo y nuevos clientes en redes sociales <br>
• Pagos 100% seguros con tarjetas de crédito y débito y tiendas de conveniencia<br>
• De requerir podrás obtener meses sin intereses para apoyar tus ventas <br>
• Envíos con precios preferenciales a toda la República mexicana<br>
• Recolección de tus productos para envíos<br>
• Promociones mensuales para miembros ( participación en descuentos, regalos)<br>
• Eventos especiales<br>
• Precios especiales en eventos (obras de teatro, conciertos)<br>
• Participación gratis* y con precio especial en todos nuestras conferencias, cursos, talleres en conecta, compra y aprende!<br>
• Eventos para la venta de tus productos<br>
• Eventos de networking<br>

</p>


</div>


<div class="col-md-6 text-left">

<h3 class="h3int">¿QUÉ INCLUYE LA MEMBRESIA CONECTA Y COMPRA SERVICIOS?</h3>
	
				<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>

<p>
<b>SERVICIOS</b><br>
• Membresía anual<br>
• Publicidad en redes sociales generalizadas<br>
• Tú tienda virtual( micrositio)<br>
• Chat de soporte para que atendamos las necesidades de tus clientes<br>
• Clave personalizada de ingreso<br>
• Uso ilimitado de productos( podrás subir y bajar tus productos como más se adecue a tu venta)*<br>
• Manejo de tus propios datos ( teléfono, e mail, mapa de ubicación etc.)<br>
• Comunicación directa con tus clientes<br>
• Chat grupo conecta y compra<br>
• Interacción con todos los del grupo y nuevos clientes en redes sociales<br>
• Pagos 100% seguros con tarjetas de crédito y débito y tiendas de conveniencia<br>
• De requerir podrás obtener meses sin intereses para apoyar tus ventas<br>
• Promociones mensuales para miembros (participación en descuentos, regalos)<br>
• Eventos especiales<br>
• Participación gratis* y con precio especial en todos nuestras conferencias, cursos, talleres en conecta, compra y aprende!<br>
• Eventos para la venta de tus productos<br>
• Eventos de networking<br>
</p>

</div>
				
				<div class="col-md-12 text-center">
					<br><br>
				<p><span style="font-size: 18px;">Podrás participar hacer parte de nuestro equipo y ganar excelentes comisiones y premios como un auto último modelo.</span></p>
					<br><br>
				</div>



            </div>
        
        </div>
			   
			   		   <div class="col-md-12">
				   
				   	<div class="col-md-6 text-center">
		<h3>Tienda de artículos</h3>
		<img src="img/productos.jpg" class="imgstore" style="max-width: 450px;">
    </div>
		<div class="col-md-6 text-center">
		<h3>Tienda de servicios</h3>
		<img src="img/servicios.jpg" class="imgstore"  style="max-width: 450px;">
    </div>
				   
			</div> 
			   
			   <center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>