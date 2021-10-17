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

		   <h2 class="h2form" style="padding:20px;">EQUIPO</h2>


			   								<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>
			   
		    <div class="col-md-5" style="padding-top:20px;">
		     	 <a data-fancybox="" data-ratio="1" href="https://www.youtube.com/watch?v=m-_DUdbiwpY&feature=youtu.be">
			<img class="imgcyc2" src="img/invitaciones.jpg" style="width:100%;   cursror:pointer;  padding: 0;">
		 </a>
		   </div>

		<div class="col-md-7" style="text-align:justify;">



        	<div class="form-group">


			<p style="margin-top:15px;">Queremos que seas parte de nuestro equipo de invitaciones!! Para pertenecer a nuestro equipo lo logras con solo un Click.</p>

			<p>Eres emprendedor, te gustan las redes sociales, quieres ganar dinero sin invertir, tener tu propio tiempo para dedicarlo con tu familia y crecer en poco tiempo? Estas en el lugar indicado!!!</p>

			<p>Buscamos a gente como tú que busca nuevas opciones de ingreso sin descuidar lo que más te gusta o de tu trabajo.</p>

			<p>Lo único que tienes que hacer es enviarle a tus conocidos, amigos, grupos o gente el sobre de invitación de Conecta y Compra para pertenecer a nuestra comunidad.</p>


            </div>

        </div>


		<div class="col-md-12" style="text-align:justify; padding-top:50px;">



        	<div class="form-group">

			<p>Por cada invitación aceptada y que se afilie como miembro de Conecta y Compra por parte de tu grupo, se te otorgará una comisión de $300.00 MXN, entre más invitaciones envíes y membresías logres reunir te harás acreedor a premios y recompensas sin igual.</p><br><br>
				
			<p>RECOMPENSAS<br><br>
100 INVITACIONES ACEPTADAS  ----- LAPTOP*<br>
500 INVITACIONES ACEPTADAS     ---..  VTP DOBLE*<br>
1000 INVITACIONES ACEPTADAS ------ AUTOMOVIL*<br><br>

*Modelos, Marcas, Destinos, Sedes, Hoteles, Transportación, AyB y cualquier otro rubro y concepto referente a las recompensas serán definidas por CyC una vez cumplida la meta.<br>
*Aplican Restricciones.<br>
*Premios en base a la presentación y comprobación de número de invitaciones aceptadas por cada miembro (Conteo individual por número de equipo).<br>
*No se permite unir números de registro o invitaciones para recibir recompensas.</p>	<br><br>

			<center><img  class="imgstore" src="img/tabla.jpg">

			<p>*Esto tendrá un limite de un año por miembro de equipo de invitación Conecta y Compra.</p></center>
				
				
								<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>
				
				<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>


            </div>

        </div>

</div>


	</div>

<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>
