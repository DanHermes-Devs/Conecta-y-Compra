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
				<h2 class="h2form" style="padding:20px;">CONTACTO</h2>
				<form id="contact-form" method="post"  role="form" style="max-width:900px; margin: 0 auto;    ">

                        <div class="messages"></div>

                        <div class="controls">

                             <div class="col-md-6">
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Nombre *</label>
                                        <input id="form_name" name="name" class="form-control" placeholder="Nombre *" required="required" data-error="Ingresa tu nombre." type="text">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_lastname">Asunto</label>
                                        <input id="form_lastname" name="surname" class="form-control" placeholder="Asunto *" required="required" data-error="Infresa un asunto." type="text">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                            </div>
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" name="email" class="form-control" placeholder="Email *" required="required" data-error="El email no es válido." type="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_phone">Teléfono</label>
                                        <input id="form_phone" name="phone" class="form-control" placeholder="Teléfono" type="tel">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
							
							 </div>
                            
							
							 <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Mensaje *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Mensaje*" rows="4" required="required" data-error="Por favor, ingresa un mensaje."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                        <div class="g-recaptcha" data-sitekey="6LfM9kwUAAAAALTG5_7qNkc2561vhKNhZkOxTlvM"></div>
                                    </div>
                                </div>

                                
                            </div>
							  </div>
							  <div class="col-md-12">
                                    <input class="btn btn-success btn-send" value="Enviar" style="background-color:#547dbf; width:100%; border-radius: 0; border:none; height:50px;" type="submit">
                                </div>
                            
                        </div>

                    </form>
		
	        <link href='recaptcha/custom.css' rel='stylesheet' type='text/css'>

  </div>

			   <center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
			   
</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>