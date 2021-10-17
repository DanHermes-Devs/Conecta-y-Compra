<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>
<style>
@media(max-width:800px){
h3 {
	text-align: center;
}	
}

</style>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container" style="padding-top:50px;">

<div class="col-md-12" style="text-align:justify;">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">MÉTODOS DE PAGO</h2>

				
	 <h3 >Vende sin preocupaciones</h3>

<p>Podrás comprar y vender con tranquilidad sabiendo que tu compras y ventas que reúnen los requisitos están protegidas contra pagos no autorizados, transacciones canceladas por sospecha de fraude y reclamaciones presentadas por artículo no recibido.</p>

<h3 >Protégete de fraudes</h3>

<p>Al aceptar pagos con tarjeta de crédito, pagos en efectivo en tiendas de conveniencia y débito, tus clientes pueden pagarte de forma sencilla y rápida. Además, para que puedas comprar y vender con seguridad, Conecta y Compra te ofrece la Protección de Pay Pal.</p>

<h3 >Evita las pérdidas</h3>

Enfócate en lo que realmente te interesa: que tus compras lleguen a tiempo y con calidad máxima. Las ventas que cumplan los requisitos estarán protegidas, evitando que tu negocio sea susceptible de pérdidas tanto económicas como de tiempo.
				
 <h3 >Aceptamos todas las tarjetas de crédito y débito</h3>

<p>
	VISA<br>
MASTERCARD<br>
AMERICAN EXPRESS<br>
<a href="https://www.paypal.com/mx/webapps/mpp/home?gclid=CjwKCAjwtIXbBRBhEiwAWV-5nhyeqR0MAjzrtGdaNvXqEo5dE0Qi_O3j8fObEETa90jJ3A_Hict0BhoCWr0QAvD_BwE&gclsrc=aw.ds&dclid=CKjQ-NezzNwCFU3YwAodOPkN4A" target="_blank">PAYPAL</a>
				</p>
				
				<h3 >Meses sin intereses</h3>
				
				<p> *Esta promoción será de acuerdo a los términos y condiciones de la promoción de cada banco.</p>
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