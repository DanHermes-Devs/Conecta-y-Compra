<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		header("Location: login");
	}
	include_once 'include/dbconnect.php';
	$uid2=$_SESSION['user'];

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		//Datos del usuarios
		
		$ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');

		$agent = mysqli_real_escape_string($_SERVER['HTTP_USER_AGENT']);

		$finish_time = time();		

		$texto_finish= date("d/m/y h:i:s a", $finish_time);
		
		// clean user inputs to prevent sql injections
		$tipo = trim($_POST['tipo']);
		$tipo = strip_tags($tipo);
		$tipo = htmlspecialchars($tipo);

		$titulo = trim($_POST['titulo']);
		$titulo = strip_tags($titulo);
		$titulo = htmlspecialchars($titulo);
		
		$categoria = trim($_POST['categoria']);
		$categoria = strip_tags($categoria);
		$categoria = htmlspecialchars($categoria);

		$tel = trim($_POST['tel']);
		$tel = strip_tags($tel);
		$tel = htmlspecialchars($tel);

		$mail = trim($_POST['mail']);
		$mail = strip_tags($mail);
		$mail = htmlspecialchars($mail);
		
		$direccion = trim($_POST['direccion']);
		$direccion = strip_tags($direccion);
		$direccion = htmlspecialchars($direccion);
		
		$etiquetas = trim($_POST['etiquetas']);
		$etiquetas = strip_tags($etiquetas);
		$etiquetas = htmlspecialchars($etiquetas);
		
		$descripcion = trim($_POST['descripcion']);
		$descripcion = strip_tags($descripcion);
		$descripcion = htmlspecialchars($descripcion);
		
		// basic name validation
		if (empty($titulo)) {
			$error = true;
			$tituloError = "Ingresa el nombre de la tienda.";
		} else if (strlen($titulo) < 4) {
			$error = true;
			$tituloError = "El nombre debe tener al menos 4 caracteres.";
		} else if (!preg_match("/^[0-9-a-zA-Z-zÑñáéíóúÁÉÍÓÚ ]+$/",$titulo)) {
			$error = true;
			$tituloError = "Por favor ingresa sólo letras, números y espacios.";
		}
		
		// basic categoria validation
		if (empty($tipo)) {
			$error = true;
			$tipoError = "Selecciona el tipo de tienda";
		}

		// basic categoria validation
		if (empty($mail)) {
			$error = true;
			$mailError = "Ingresa el correo de contacto de la tienda";
		}

		// basic categoria validation
		if (empty($tel)) {
			$error = true;
			$telError = "Ingresa el teléfono de contacto de la tienda";
		}

		if (empty($etiquetas)) {
			$error = true;
			$etiquetasError = "Ingresa al menos 3 etiquetas.";
		}
		
		// basic categoria validation
		if (empty($descripcion)) {
			$error = true;
			$descripcionError = "Ingresa una descripcion breve de la tienda.";
		}
		
		
		
		// basic categoria validation
		if (empty($categoria)) {
			$error = true;
			$categoriaError = "Selecciona una categoría.";
		}
		
		// basic tel validation
		if (strlen($tel) > 5) {
			
			if (!preg_match("/^[0-9]+$/",$tel)) {
			$error = true;
			$telError = "Por favor ingresa sólo números y espacios.";
		} 
		
		}
		
$string = $titulo;

function toAscii($str, $replace=array(), $delimiter='-') {
 if( !empty($replace) ) {
  $str = str_replace((array)$replace, ' ', $str);
 }

 $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
 $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
 $clean = strtolower(trim($clean, '-'));
 $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

 return $clean;
}


$s =  toAscii($string, '', ' ');
$r = preg_replace('/\W+/', '-', strtolower($s));

$urltienda = $r;

		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO tiendas(id_usuario, tipo, titulo, descripcion, etiquetas, categoria, telefono, email, direccion, url,  fecharegistro, ip, activo) VALUES($uid2, '$tipo', '$titulo','$descripcion', '$etiquetas','$categoria', '$tel', '$mail', '$direccion', '$urltienda', '$texto_finish', '$ip', 1)";
			$res = mysqli_query($conn, $query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Tu tienda se registró con éxito. Comienza a personalizarla <a href='/cyc/tienda/".$urltienda."'>aquí</a>";
				unset($titulo);
				unset($categoria);
				unset($descripcion);
				unset($etiquetas);
				unset($tel);
				unset($descripcion);
			} else {
				$errTyp = "danger";
				$errMSG = "Ocurrió un error, por favor intenta nuevamente más tarde...";	
			}	
				
		}
		
		
	}
	
	
	require_once 'include/header.php';
?>
<style>
@media(max-width:800px){
	.imgvideo{padding-top: 20px !important;}
}
select {
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 0px 5px 4px 0px;
	width: 100%;
}
</style>

    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; padding-top:80px;">
		   
		   <div class="container">

		   
		   <div class="col-md-6 imgvideo" style="padding-top:120px;">
		     	 <a data-fancybox="" data-ratio="1" href="https://www.youtube.com/watch?v=fo1qnagqKiU">
			<img class="imgcyc2" src="img/tutorialvideo.jpg" style="width:100%;   cursror:pointer;  padding: 0;">
		 </a>	
		   </div>  
		   
		   
		   <div class="col-md-6">
		   
		   <div id="login-form" style="text-align:center;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="h2form">Crea tu tienda</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
            	
				<select name="tipo">
					<option value="">Selecciona el tipo de tienda</option>
					<option value="articulos">Conecta y Compra Artículos</option>
					<option value="servicios">Conecta y Compra Servicios</option>
					
				</select>
                </div>
                <span class="text-danger"><?php echo $tipoError; ?></span>
            </div>

			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
            	<input type="text" name="titulo" class="form-control" placeholder="Nombre de tu tienda" maxlength="50" value="<?php echo $titulo ?>" />
                </div>
                <span class="text-danger"><?php echo $tituloError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-menu-hamburger"></span></span>
            	<input type="text" name="categoria" class="form-control" placeholder="Categoría" maxlength="50" value="<?php echo $categoria ?>" />
                </div>
                <span class="text-danger"><?php echo $categoriaError; ?></span>
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
            	<input type="text" name="etiquetas" class="form-control" placeholder="Etiquetas" data-role="tagsinput"  maxlength="50" value="<?php echo $etiquetas ?>" />
                </div>
                <span class="text-danger"><?php echo $etiquetasError; ?></span>
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></span>
            	<textarea name="descripcion" class="form-control" placeholder="Descripción Breve" maxlength="280"><?php echo $descripcion ?></textarea>
                </div>
                <span class="text-danger"><?php echo $descripcionError; ?></span>
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="mail" class="form-control" placeholder="Email de tienda" value="<?php echo $mail ?>" />
                </div>
                <span class="text-danger"><?php echo $mailError; ?></span>
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            	<input type="text" name="tel" class="form-control" placeholder="Teléfono de tienda" maxlength="40" value="<?php echo $tel ?>" />
                </div>
                <span class="text-danger"><?php echo $telError; ?></span>
            </div>
            
           <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
            	<textarea name="direccion" class="form-control" placeholder="Dirección (Opcional)" maxlength="280"><?php echo $direccion ?></textarea>
                </div>
                <span class="text-danger"><?php echo $direccionError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">REGISTRAR TIENDA</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
          
        
        </div>
   
    </form>
    </div>
		   </di>
		   
		 

		

</div>
	   
           
	</div>

	</div>
	
<?php require_once 'include/footer.php'; ?>
</body>

</html>
<?php ob_end_flush(); ?>