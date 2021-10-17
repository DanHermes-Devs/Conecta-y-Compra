<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){

		header("Location: login.php");

	}

	include_once 'dbconnect.php';

	$uid2=$_SESSION['user'];

	

	$querytienda = "SELECT * FROM tiendas WHERE id_usuario = $uid2  ORDER BY id_tienda DESC LIMIT 1";

	$resulttienda = mysqli_query($conn, $querytienda) or die("Falló la consulta $querytienda");

		$numero_filas = mysqli_num_rows($resulttienda);

		

		if($numero_filas == 0){

			//header('Location: /cyc');

		}

	

	$rowtienda = mysqli_fetch_assoc($resulttienda);

	$id_tienda 	= $rowtienda['id_tienda'];

	

	

	$id_producto = $_GET['id'];

	$idprod = $_GET['id'];

	

		$img1= '';

		$img2= '';

		$img3= '';

	

	if(strlen($idprod)>0){

		$queryprod = "SELECT * FROM productos WHERE id_producto = $idprod";

		$resultprod= mysqli_query($conn, $queryprod) or die("Falló la consulta $queryprod");

		$numero_filasprod = mysqli_num_rows($resultprod);

		

		if($numero_filasprod == 0){

			//header('Location: /cyc');

		}

		

	

		$rowprod = mysqli_fetch_assoc($resultprod);

		

		$id_producto = $rowprod['id_producto'];

		$titulo = $rowprod['nombre'];

		$categoria = $rowprod['categoria'];

		$etiquetas = $rowprod['etiquetas'];

		$descripcion = $rowprod['resumen'];

		$stock = $rowprod['stock'];

		$precio1 = $rowprod['precio1'];

		$precio2 = $rowprod['precio2'];

		

		$img1= $rowprod['img1'];

		$img2= $rowprod['img2'];

		$img3= $rowprod['img3'];

		

	}

		



	



	$error = false;



	if ( isset($_POST['btn-addprod']) ) {

	

		

		//Datos del usuarios

		

		$ip = getenv('HTTP_CLIENT_IP')?:

		getenv('HTTP_X_FORWARDED_FOR')?:

		getenv('HTTP_X_FORWARDED')?:

		getenv('HTTP_FORWARDED_FOR')?:

		getenv('HTTP_FORWARDED')?:

		getenv('REMOTE_ADDR');



		$agent = mysqli_real_escape_string($conn, $_SERVER['HTTP_USER_AGENT']);



		$finish_time = time();		



		$texto_finish= date("d/m/y h:i:s a", $finish_time);

		

		// clean user inputs to prevent sql injections

		

		$id_prod =  trim($_POST['id_prod']);

		

		

		$titulo = trim($_POST['titulo']);

		$titulo = strip_tags($titulo);

		$titulo = htmlspecialchars($titulo);

		

		$categoria = trim($_POST['categoria']);

		$categoria = strip_tags($categoria);

		$categoria = htmlspecialchars($categoria);



		

		$etiquetas = trim($_POST['etiquetas']);

		$etiquetas = strip_tags($etiquetas);

		$etiquetas = htmlspecialchars($etiquetas);

		

		$descripcion = trim($_POST['descripcion']);

		$descripcion = strip_tags($descripcion);

		$descripcion = htmlspecialchars($descripcion);

		

		

		$stock = trim($_POST['stock']);

		$stock = strip_tags($stock);

		$stock = htmlspecialchars($stock);

		

		$precio1 = trim($_POST['precio1']);

		$precio1 = strip_tags($precio1);

		$precio1 = htmlspecialchars($precio1);

		

		$precio2 = trim($_POST['precio2']);

		$precio2 = strip_tags($precio2);

		$precio2 = htmlspecialchars($precio2);

		

		// basic name validation

		if (empty($titulo)) {

			$error = true;

			$tituloError = "Ingresa el nombre del producto.";

		} else if (strlen($titulo) < 4) {

			$error = true;

			$tituloError = "El nombre debe tener al menos 4 caracteres.";

		} else if (!preg_match("/^[0-9-a-zA-Z-zÑñáéíóúÁÉÍÓÚ ]+$/",$titulo)) {

			$error = true;

			$tituloError = "Por favor ingresa sólo letras, números y espacios.";

		}

		



		// basic categoria validation

		if (empty($etiquetas)) {

			$error = true;

			$etiquetasError = "Ingresa al menos 3 etiquetas.";

		}

		

		// basic categoria validation

		if (empty($descripcion)) {

			$error = true;

			$descripcionError = "Ingresa una descripcion breve del producto.";

		}

		

		

		

		// basic categoria validation

		if (empty($categoria)) {

			$error = true;

			$categoriaError = "Selecciona una categoría.";

		}

		

		// basic categoria validation

		if (empty($categoria)) {

			$error = true;

			$categoriaError = "Selecciona una categoría.";

		}

		

		// basic precio validation

		if (empty($precio1)) {

			$error = true;

			$precio1Error = "Ingresa el precio de tu producto.";

		}

		

		// basic precio validation

		if (empty($stock)) {

			$error = true;

			$stockError = "Ingresa el número de productos en existencia.";

		}

		

		// basic precio validation

		if (empty($precio2)) {

			

			$precio2 =0;

		}

		

		// basic precio validation

		if ($precio1< $precio2) {

			$error = true;

			$precio1Error = "El precio con descuento debe ser menor al precio original";

		}

		

		

		function GetImageExtension($imagetype){

		   if(empty($imagetype)) return false;

		   switch($imagetype)

		   {

			   case 'image/bmp': return '.bmp';

			   case 'image/jpeg': return '.jpg';

			   case 'image/png': return '.png';

			   default: return false;

		   }

		}

		

		$length = 5;



		$random1 = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);

		$random2 = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);

		$random3 = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);







		if (!empty($_FILES["uploadedimage1"]["name"])) {

			$file_name1=$_FILES["uploadedimage1"]["name"];

			$temp_name1=$_FILES["uploadedimage1"]["tmp_name"];

			$imgtype1=$_FILES["uploadedimage1"]["type"];

			$ext1= GetImageExtension($imgtype1);

			$imagename1= "photo-u".$uid2."-".$random1.$ext1;

			$target_path1 = "uploads/".$imagename1;





			if(move_uploaded_file($temp_name1, $target_path1)) {

				$rutaimg1 ="'".$target_path1."'";

			}

		}

		else{

			$error = true;

			$img1Error = "Agrega al menos una imagen de tu producto.";

			

		}

		

		if (!empty($_FILES["uploadedimage2"]["name"])) {

			$file_name2=$_FILES["uploadedimage2"]["name"];

			$temp_name2=$_FILES["uploadedimage2"]["tmp_name"];

			$imgtype2=$_FILES["uploadedimage2"]["type"];

			$ext2= GetImageExtension($imgtype2);

			$imagename2= "photo-u".$uid2."-".$random2.$ext2;

			$target_path2 = "uploads/".$imagename2;





			if(move_uploaded_file($temp_name2, $target_path2)) {

				$rutaimg2 ="'".$target_path2."'";

			}

		}

		else{

			

			$rutaimg2 ="'-'";

			

		}

		

		

		if (!empty($_FILES["uploadedimage3"]["name"])) {

			$file_name3=$_FILES["uploadedimage3"]["name"];

			$temp_name3=$_FILES["uploadedimage3"]["tmp_name"];

			$imgtype3=$_FILES["uploadedimage3"]["type"];

			$ext3= GetImageExtension($imgtype3);

			$imagename3= "photo-u".$uid2."-".$random3.$ext3;

			$target_path3 = "uploads/".$imagename3;





			if(move_uploaded_file($temp_name3, $target_path3)) {

				$rutaimg3 ="'".$target_path3."'";

			}

		}

		else{

			

			$rutaimg3 ="'-'";

			

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



		$url = $r;

		

		

		



		



		

		// if there's no error, continue to signup

		if( !$error ) {

			

			$query = "UPDATE productos SET 

			nombre = '$titulo', 

			resumen = '$descripcion', 

			precio1 = $precio1 , 

			precio2 = $precio2, 

			img1 = $rutaimg1, 

			img2 = $rutaimg2, 

			img3 = $rutaimg3, 

			url = '$url', 

			etiquetas = '$etiquetas', 

			categoria = '$categoria', 

			stock = $stock

			WHERE id_producto = $id_prod

			"

			;

			$res = mysqli_query($conn, $query);

				

			if ($res) {

				$errTyp = "success";

				$errMSG = "Tu producto se registró con éxito. Puedes verlo <a href='/cyc/producto/".$url."'>aquí</a>";

				unset($titulo);

				unset($categoria);

				unset($descripcion);

				unset($etiquetas);

				unset($tel);

				unset($descripcion);

			} else {

				$errTyp = "danger";

				$errMSG = "Ocurrió un error, por favor intenta nuevamente más tarde..." .$query;	

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



.fotos .input-group {

	display: inline-block;

	padding: 10px 0;

}



.fotos .input-group-addon {

	width: auto;

	float: left;

}



.col-md-6.fotos {

	text-align: left;

	/* padding: 20px 0; */

}

input[type="file"] {

	display: block;

	height: 29.5px;

	width: auto;

}





.navbar-inverse {

	background-color: #fff;

	border-color: transparent;

	min-height: 100px;

	display: none !important;

}

.container.pagecont {

	min-height: 45vh;

	padding: 0;

	padding-top: 0 !important;

	margin: 0 !important;

}

body {

	font-family: 'Open Sans', sans-serif !important;

	margin-top: 0;

}

#cycfooter, #footergreen {

	display: none;

}



.imgprod {

	width: 20%;

	padding: 0;

	margin: 10px 0;

	min-width: 100px;

}

.fotos .form-group {

	width: 33%;

	float: left;

	padding: 0 2% 0 0;

}

.fotos .input-group-addon {

	display: none;

}



#login-form {

	margin-top: 10px;

}

.form-group {

	display: inline-block;

	width: 100%;

}

.col-md-6 {

	float: left;

}



</style>

		   

		  

		   

		   

		   <div class="col-md-12">



<h2 class="h2form">EDITAR PRODUCTO</h2>

		   

		   <div id="login-form" style="text-align:center;">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

	

	<input type="hidden" name="id_prod" value="<?php echo $_GET['id']; ?>">

    

    	<div class="col-md-6 fotos">

		 <div class="form-group">

            	<div class="input-group">

				<p>Imagen principal</p>

                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

					<input type="file" name="uploadedimage1" id="uploadedimage1" class="inputfile inputfile-1" accept="image/x-png,image/jpeg" required/>

					   <span class="text-danger"><?php echo $img1Error; ?></span>

					   <?php if(strlen($img1)>5){

						   

						   echo '<img class="imgprod" src="/cyc/'.$img1.'">';						   

					   }

						   

					   ?>

                </div>

              

          </div>



		  <div class="form-group">

            	<div class="input-group">

				<p>2a imagen</p>

                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

					<input type="file" name="uploadedimage2" id="uploadedimage2" class="inputfile inputfile-2" accept="image/x-png,image/jpeg"/>

					 <?php if(strlen($img2)>5){

						   

						   echo '<img class="imgprod" src="/cyc/'.$img2.'">';						   

					   }

						   

					   ?>

                </div>

              

          </div>



		  <div class="form-group">

            	<div class="input-group">

				<p>3a imagen</p>

                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

					<input type="file" name="uploadedimage3" id="uploadedimage3" class="inputfile inputfile-2" accept="image/x-png,image/jpeg"/>

					 <?php if(strlen($img3)>5){

						   

						   echo '<img class="imgprod" src="/cyc/'.$img3.'">';						   

					   }

						   

					   ?>

                </div>

              

          </div>

		

               

          

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

                <span class="input-group-addon"><span class="glyphicon glyphicon-stats"></span></span>

            	<input type="number" name="stock" class="form-control" placeholder="Unidades disponibles" maxlength="40" value="<?php echo $stock ?>" />

                </div>

                <span class="text-danger"><?php echo $stockError; ?></span>

            </div>

			

			<div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>

            	<input type="number" name="precio1" class="form-control" placeholder="Precio original" maxlength="40" value="<?php echo $precio1 ?>" />

                </div>

                <span class="text-danger"><?php echo $precio1Error; ?></span>

            </div>

			

			<div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>

            	<input type="number" name="precio2" class="form-control" placeholder="Precio con descuento" maxlength="40" value="<?php echo $precio2 ?>" />

                </div>

                <span class="text-danger"><?php echo $precio2Error; ?></span>

            </div>

            



            

            <div class="form-group">

            	<hr />

            </div>

            

            <div class="form-group">

            	<button type="submit" class="btn btn-block btn-primary" name="btn-addprod">GUARDAR PRODUCTO</button>

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

	

    <!-- Bootstrap Core JavaScript -->

    <script src="/cyc/js/bootstrap.min.js"></script>

	<script src="/cyc/js/bootstrap-tagsinput.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

	

        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script src="/cyc/recaptcha/validator.js"></script>

        <script src="/cyc/recaptcha/contact.js"></script>

		

		<script type="text/javascript">

		/*var LHCChatOptions = {};

		LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'digitaltryout.com'};

		(function() {

		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

		var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';

		var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';

		po.src = '//digitaltryout.com/cyc/chat/index.php/esp/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;

		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

		})();*/

		

		

		</script>

		

		<script>



		$(window).load(function() {

		 $("#iconclose").trigger("click");

			  $(".splash").fadeOut("slow");

			  $("body").fadeIn("fast");



		});

		

		$('body').on('click','.btnchat2', function(e) { 

		e.preventDefault();

		   //$('.status-icon').trigger('click');

		   $('#maximizeChat').trigger('click');

		});



		$(".imgcyc").click(function(){

			window.location = '/cyc/tiendaprueba';

		});

		

		$(".imgcycs").click(function(){

			window.location = '/cyc/serviciosprueba';

		});



		

		</script>

</body>



</html>

<?php ob_end_flush(); ?>