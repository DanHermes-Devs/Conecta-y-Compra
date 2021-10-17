<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>

<style>
.container.mmac {
				padding-top:50px;
				}
@media(max-width:800px){
		.container.mmac {
			padding-top: 0px;
		}
		.btn-primary {
			max-width: 100%;
		}
	}
</style>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container mmac">

<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">INVITADOS</h2>

				</div>	
	
	<div class="col-md-12">

				
				<center><br>
					
				<b>¡BIENVENIDO A TU MEJOR EXPERIENCIA!</b><br><br>
	<p>RECUERDA REGISTRARTE PARA RECIBIR PROMOCIONES Y BENEFICIOS.</p><br><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>SEGUIR COMPRANDO</b></h2>
				</a><br>
	            </center>
		
		
		
	</div>
	

            </div>
			   
			   <!--<div class="col-md-12 text-center">
				   
				   	<div class="col-md-6">
		<h3>Tienda de artículos</h3>
		<img src="img/productos.jpg" style="max-width: 450px;">
    </div>
	<div class="col-md-6">
		<h3>Tienda de servicios</h3>
		<img src="img/servicios.jpg" style="max-width: 450px;">
    </div>
				   
				   
				   
			</div>-->   
			   
			   <center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>