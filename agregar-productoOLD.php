<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		header("Location: login.php");
	}
	include_once 'dbconnect.php';
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

		$agent = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);

		$finish_time = time();		

		$texto_finish= date("d/m/y h:i:s a", $finish_time);
		
		// clean user inputs to prevent sql injections
		$titulo = trim($_POST['titulo']);
		$titulo = strip_tags($titulo);
		$titulo = htmlspecialchars($titulo);
		
		$categoria = trim($_POST['categoria']);
		$categoria = strip_tags($categoria);
		$categoria = htmlspecialchars($categoria);

		$tel = trim($_POST['tel']);
		$tel = strip_tags($tel);
		$tel = htmlspecialchars($tel);
		
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
		if (empty($etiquetas)) {
			$etiquetas = true;
			$etiquetasError = "Ingresa al menos 3 etiquetas.";
		}
		
		// basic categoria validation
		if (empty($descripcion)) {
			$descripcion = true;
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
		

		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO tiendas(id_usuario, titulo, descripcion, etiquetas, categoria, telefono, direccion, fecharegistro, ip, activo) VALUES($uid2, '$titulo','$descripcion', '$etiquetas','$categoria', '$tel', '$direccion', '$texto_finish', '$ip', 1)";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Tu tienda se registró con éxito. Comienza a personalizarla <a href='tienda.php'>aquí</a>";
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
<link href="css/imageuploadify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; padding-top:80px;">
		   
		   <div class="container">
<style>
#login-form {
	margin: 5% auto;
	max-width: 100%;
	/* float: left; */
}

.btn-default {
	color: #333;
	background-color: transparent;
	border-color: #;
}

</style>
		   
		  
		   
		   
		   <div class="col-md-12">

<h2 class="h2form">AGREGA UN NUEVO PRODUCTO</h2>
		   
		   <div id="login-form" style="text-align:center;">
    <form method="post" action="#" autocomplete="off">
    
    	<div class="col-md-6">
		
                <input type="file" accept="image/*" multiple>
          
		</div>

		<div class="col-md-6">

            
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
            	<input type="text" name="titulo" class="form-control" placeholder="Nombre del producto" maxlength="50" value="<?php echo $titulo ?>" />
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            	<input type="text" name="tel" class="form-control" placeholder="Precio" maxlength="40" value="<?php echo $tel ?>" />
                </div>
                <span class="text-danger"><?php echo $telError; ?></span>
            </div>
            

            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="/cyc/producto.php"class="btn btn-block btn-primary" >GUARDAR PRODUCTO</a>
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
     <script type="text/javascript" src="js/imageuploadify.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();
            })
        </script>
	
<?php require_once 'include/footer.php'; ?>
</body>

</html>
<?php ob_end_flush(); ?>