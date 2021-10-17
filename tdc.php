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
            	<h2 class="h2form" style="padding:20px;">TARJETAS DE CRÉDITO</h2>

				
	 <h3 >Aceptamos todas las tarjetas de crédito y débito</h3>

<p>
	VISA<br>
MASTERCARD<br>
AMERICAN EXPRESS<br>
<a href="https://www.paypal.com/mx/webapps/mpp/home?gclid=CjwKCAjwtIXbBRBhEiwAWV-5nhyeqR0MAjzrtGdaNvXqEo5dE0Qi_O3j8fObEETa90jJ3A_Hict0BhoCWr0QAvD_BwE&gclsrc=aw.ds&dclid=CKjQ-NezzNwCFU3YwAodOPkN4A" target="_blank">PAYPAL</a>
				</p>	


            </div>
	
	<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>