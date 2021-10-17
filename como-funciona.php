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
            	<h2 class="h2form" style="padding:20px;">¿CÓMO FUNCIONA?</h2>

				
 <p style="text-align: justify;">Conecta y Compra es creado para ti como la nueva y  única comunidad e-commerce en donde une a todas aquellas personas y grupos para su crecimiento y desarrollo, tanto de productos como en lo personal, dentro de nuestro grupo encontrarás todas las herramientas para que compres, vendas, aprendas, te comuniques y sobre todo consigas tus metas, emprendiendo en este nuevo mundo de competencia por sobre todo con seguridad, respeto y pasión para alcanzar el éxito!<br><br>
	
Conecta y Compra es tu mejor herramienta no solo para hacer crecer tu negocio sino para tener presencia en base a tus productos, servicios o crecimiento personal.<br><br>

Existen dos maneras de pertenecer a tu comunidad e-commerce:<br><br>
	 
1.- Inscribete en 3 fáciles pasos y empieza a crear tu tienda virtual.<br>
2.- Invita a tus amigos y grupos a que te visiten y listo! Podrás incursionar al nuevo mundo del e-commerce.<br<br>
Por nuestra parte te apoyaremos por medio de publicidad, herramientas de búsqueda, promociones y la seguridad requerida logrando así darnos a conocer, teniendo resultados en tu nivel de ventas y compras, logrando el éxito que tanto buscas.</p>

            </div>
	
	<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>