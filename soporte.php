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
        
        	<div class="form-group" style="text-align:center;">
            	<h2 class="h2form" style="padding:20px;">SOPORTE</h2>

				
 <p>Si requieres nuestra ayuda, por favor comunícate a </p>
<a href="maito:soporte@conectaycompra.com">
<center><img src="/cyc/img/mail.png" style="width:100px; max-width:100%;"></center>
<h3 class="h3int">soporte@conectaycompra.com</h3></a>

<p>Te contestaremos en un máximo de 48 horas.</p>


            </div>
        
	<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
	
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>