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

<div class="col-md-12" style="text-align:justify;">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">COMISIONES</h2>


<p>Recuerda que por cada pago que recibas, se cobrará una comisión por uso de herramientas bancarias asi como proceso de compra-venta del 8% + 10 pesos IVA por cada transacción que realices.</p>	
				
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