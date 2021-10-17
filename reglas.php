<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container" style="padding-top:50px;">

<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">REGLAS DE COMPRA-VENTA</h2>


<p>- No se pueden vender artículos usados.</p>

<p>- No se pueden vender, ofrecer o promover ningún tipo de estupefacientes o algún otro producto ilegal.</p>

<p>- No se permite la venta de ningún animal vivo (promovamos la adopción).</p>

<p>- El uso de tu logotipo y artículos, son propiedad de cada miembro.</p>

<p>- Todos tus artículos deben tener descripción y características dentro de tu página.</p>

<p>- Es totalmente prohibido el uso de la página como medio para conocer personas y tener relaciones amorosas.</p>

<p>- No podrás subir fotos con ninguna incidencia pornográfica, así como imágenes violentas, de maltrato humano o animal, etc.</p>

				<h2 class="h2form" style="padding:20px;">REGLAS DE CONVIVENCIA</h2>

<p>- No se permite ninguna falta de respeto.</p>

<p>- Se respeta preferencia religiosa, social y cultural.</p>

<p>- Cualquier comentario fuera de lugar o/y ofensivo será acreditado a una amonestación y dependiendo la gravedad del mismo, podrá ser acreedor a una doble amonestación y a la baja definitiva.</p>

<p>- Todos tus posts tendrán que ser personales, no puedes hacer uso de comentarios o posts de otras personas.</p>

<p>- No se permite hacer mala fama de ningún otro miembro, de requerir ayuda contáctanos primero.</p>

<p>- Las opiniones de los demás son igual de validas que las tuyas, mantengamos el respeto y apoyémonos unos a otros para crecer y ser mejores todos los días.</p>



<br><br>
				<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>











            </div>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>