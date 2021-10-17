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
            	<h2 class="h2form" style="padding:20px;">EQUIPO</h2>

				

 <p>¡Queremos que seas parte de nuestro equipo de invitaciones! Para pertenecer a nuestro equipo lo logras con solo un Click.</p>

<p>¿Eres emprendedor, te gustan las redes sociales, quieres ganar dinero sin invertir, tener tu propio tiempo para dedicarlo con tu familia y crecer en poco tiempo? ¡Estas en el lugar indicado!</p>

<p>Buscamos a gente como tú que busca nuevas opciones de ingreso sin descuidar lo que mas te gusta o de tu trabajo.</p>

<p>Lo único que tienes que hacer es enviarle a tus conocidos, amigos, grupos o gente la invitación e invitarlos a pertenecer a nuestra comunidad Conecta y Compra.</p>

<p>Por cada invitación aceptada y que pertenezca como miembro de Conecta y Compra por parte de tu grupo, se te otorgará una comisión de $300.00 MXN, entre más invitación envíes y membresías logres reunir serás otorgado premios y recompensas sin igual, Solo invitando a Conecta y Compra.</p><br><br>
				
<center><img src="img/tabla.jpg">
				
<p>*Esto tendrá un limite de un año por miembro de equipo de invitación Conecta y Compra.</p></center>




            </div>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>