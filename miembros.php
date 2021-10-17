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

<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">MIEMBROS</h2>

				</div>	
	
									<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>
	
	<div class="col-md-6">
	
		<br><br><br><br>
	 <p style="font-weight:bold;">Para ser miembro necesitas lo siguiente:</p>

<p>
- Productos o Servicios a promocionar<br>
- Nombre de Tu empresa<br>
- Contacto<br>
- Ubicación<br>
- Datos Generales<br>
- Pago Anual para contar con tu tienda virtual y publicidad general.
	
	</div>
	
		<div class="col-md-6" style="padding-top:20px;">
		     	 <a data-fancybox="" data-ratio="1" href="https://www.youtube.com/watch?v=E7cX5b8Kcz0">
			<img class="imgcyc2" src="img/miembros.jpg" style="width:100%;   cursror:pointer;  padding: 0;">
		 </a>
		   </div>
	
	<div class="col-md-12">

<b>Membresía Anual</b><br><br>
- 12 meses de espacio e-commerce<br>
- Espacio para colocar tu logotipo<br>
- Escaparate para imagenes de tus productos<br> 
- Publicidad en redes sociales generalizadas<br>
- Tú tienda virtual( micrositio)<br>
- Chat de soporte para que atendamos las necesidades de tus clientes<br>
- Clave personalizada de ingreso<br>
- Modificación o cambio de tus productos<br>
- Uso ilimitados de productos (podrás subir y bajar tus productos como más se adecue a tu venta)*<br>
- Codigos SKU en cada uno de tus productos aplica en Conecta y Compra Artículos<br>
- Seguridad de Claves<br>
- Calificación de tus compradores<br>
- Comunicación por chat con tus clientes<br>
- Manejo de tus propios datos ( teléfono, e mail, mapa de ubicación etc.) en Conecta y Compra Servicios<br>
- Chat grupo Conecta y Compra<br>
- Interacción con todos los del grupo y nuevos clientes en redes sociales<br>
- Pagos 100% seguros con tarjetas de crédito, débito y tiendas de conveniencia<br>
- De requerir podrás obtener meses sin intereses para apoyar tus ventas<br>
- Envíos con precios preferenciales a toda la República mexicana <br>
- Recolección de tus productos para envíos<br>
- Promociones mensuales para miembros (participación en descuentos, regalos)<br>
- Eventos especiales<br>
- Precios especiales en eventos (obras de teatro, conciertos entre otros)<br>
- Participación gratis* y con precio especial en todos nuestras conferencias, cursos, talleres en conecta, compra y aprende!<br>
- Eventos para la venta de tus productos<br>
- Eventos de networking<br><br>

<b>Tendrás acceso a todos los benéficos de conecta y compra!</b><br><br>

<center><b><span style="font-size: 22px;">Podrás participar ser parte de nuestro equipo y ganar excelentes comisiones y premios como un auto último modelo</span></b></center><br><br>

Tú participación es lo más importante para hacer crecer y fortalecer nuestra comunidad con compromiso y éxito!<br><br>

Es momento de unirnos y juntos soñar en grande, CONECTA Y COMPRA es tu mejor opción<br><br>

*La capacidad que incluye la membresía es de 20 imágenes por bloque, con uso ilimitado de bloques. (En caso de requerir una mayor capacidad por bloque, tendrá un costo extra, para mayor información comunícate con nuestro equipo.
</p>
				
				<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>
		
		
		
	</div>
	

            </div>
			   
			   <div class="col-md-12 text-center">
				   
				   	<div class="col-md-6">
		<h3>Tienda de artículos</h3>
		<img  class="imgstore" src="img/productos.jpg" style="max-width: 450px;">
    </div>
	<div class="col-md-6">
		<h3>Tienda de servicios</h3>
		<img  class="imgstore" src="img/servicios.jpg" style="max-width: 450px;">
    </div>
				   
				   
				   
			</div>   
			   
			   <center><img class="logo-responsive" src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:15%;"></center>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>