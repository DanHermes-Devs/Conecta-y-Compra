<?php

ob_start();

session_start();

if( !isset($_SESSION['user'])){

	header("Location: login.php");

}

include_once 'dbconnect.php';

$uid2=$_SESSION['user'];



$querytienda = "SELECT * FROM tiendas WHERE id_usuario = $uid2  AND tipo = 'articulos' ORDER BY id_tienda DESC LIMIT 1";

$resulttienda = mysqli_query($conn, $querytienda) or die("Falló la consulta $querytienda");

$numero_filas = mysqli_num_rows($resulttienda);



if($numero_filas == 0){

			//header('Location: /cyc');

}





$rowtienda = mysqli_fetch_assoc($resulttienda);



$id_tienda 	= $rowtienda['id_tienda'];



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


	$id_categoria = trim($_POST['id_categoria']);

	$id_categoria = strip_tags($id_categoria);

	$id_categoria = htmlspecialchars($id_categoria);


	$id_subcategoria = 0;


	$id_subcategoria = trim($_POST['id_subcategoria']);

	$id_subcategoria = strip_tags($id_subcategoria);

	$id_subcategoria = htmlspecialchars($id_subcategoria);


	$titulo = trim($_POST['titulo']);

	$titulo = strip_tags($titulo);

	$titulo = htmlspecialchars($titulo);



	// $categoria = trim($_POST['categoria']);

	// $categoria = strip_tags($categoria);

	// $categoria = htmlspecialchars($categoria);





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

	if (empty($id_categoria)) {

		$error = true;

		$categoriaError = "Selecciona una categoría.";

	}



		// basic categoria validation

	// if (empty($categoria)) {

	// 	$error = true;

	// 	$categoriaError = "Selecciona una categoría.";

	// }



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



		$query = "INSERT INTO productos(id_tienda, id_categoria, id_subcat, nombre, resumen, precio1, precio2, img1, img2, img3, url, etiquetas, categoria, stock, fecha, ip, activo) VALUES($id_tienda, $id_categoria, $id_subcategoria,'$titulo','$descripcion', $precio1, $precio2, $rutaimg1, $rutaimg2, $rutaimg3, '$url', '$etiquetas', '$categoria', '$stock', '$texto_finish', '$ip', 1)";

		$res = mysqli_query($conn, $query);



		if ($res) {

			$errTyp = "success";

			$errMSG = "Tu producto se registró con éxito. Puedes verlo <a href='/cyc/producto/".$url."'>aquí</a>";

			unset($titulo);

			unset($id_categoria);

			unset($id_subcategoria);

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


		.d-block {
			display: block;
		}

		.subcategoria {
			display: none;
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



	</style>









	<div class="col-md-12">



		<h2 class="h2form">AGREGA UN NUEVO PRODUCTO</h2>



		<div id="login-form" style="text-align:center;">

			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">



				<div class="col-md-6 fotos">

					<div class="form-group">

						<div class="input-group">

							<p>Imagen principal</p>

							<span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

							<input type="file" name="uploadedimage1" id="uploadedimage1" class="inputfile inputfile-1" accept="image/x-png,image/jpeg" required/>

							<span class="text-danger"><?php echo $img1Error; ?></span>

						</div>



					</div>



					<div class="form-group">

						<div class="input-group">

							<p>2a imagen</p>

							<span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

							<input type="file" name="uploadedimage2" id="uploadedimage2" class="inputfile inputfile-2" accept="image/x-png,image/jpeg"/>

						</div>



					</div>



					<div class="form-group">

						<div class="input-group">

							<p>3a imagen</p>

							<span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>

							<input type="file" name="uploadedimage3" id="uploadedimage3" class="inputfile inputfile-2" accept="image/x-png,image/jpeg"/>

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

							<!-- <input type="text" name="categoria" class="form-control" placeholder="Categoría" maxlength="50" value="<?php //echo $categoria ?>" /> -->

							<?php 

							$sqlCategorias = "SELECT * FROM categorias";
							$rsMostrarCats = mysqli_query ($conn, $sqlCategorias);
							

							?>

							<select class="form-control" name="id_categoria" id="categoria">
								<option value="0">Elige una Categoría</option>
								<?php while ($rowCats = mysqli_fetch_assoc($rsMostrarCats)) { ?>
									<option value="<?php echo $rowCats["id"]; ?>" id="<?php echo $rowCats["id"]; ?>"><?php echo $rowCats["nombre_cat"]; ?></option>

								<?php } ?>

							</select>

						</div>

						<span class="text-danger"><?php echo $categoriaError; ?></span>

					</div>

					<!-- Se mostrara si la categoria es Ropa y accesorios -->

					<?php  ?>

					<div class="form-group subcategoria" id="sub">

						<div class="input-group">

							<span class="input-group-addon"><span class="glyphicon glyphicon-menu-hamburger"></span></span>

							<!-- <input type="text" name="categoria" class="form-control" placeholder="Categoría" maxlength="50" value="<?php //echo $categoria ?>" /> -->

							<?php 

							$sqlSubCategorias = "SELECT * FROM subcategorias";
							$rsMostrarSubCats = mysqli_query ($conn, $sqlSubCategorias);
							

							?>

							<select class="form-control" name="id_subcategoria" id="id_subcategoria">
								<option value="0">Elige una Subcategoría</option>

								<?php while ($rowSubCats = mysqli_fetch_assoc($rsMostrarSubCats)) { ?>
									<option class="subscats" value="<?php echo $rowSubCats["id_subcat"]; ?>"><?php echo $rowSubCats["nombre_subcat"]; ?></option>							
								<?php } ?>

							</select>

						</div>

						<span class="text-danger"><?php echo $categoriaError; ?></span>

					</div>

					<!-- Se mostrara si la categoria es Ropa y accesorios -->



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

	</div>











</div>





</div>

<script type="text/javascript" src="js/imageuploadify.min.js"></script>



<script type="text/javascript">

	$(document).ready(function() {

		$('input[type="file"]').imageuploadify();


		$('select#categoria').on('change',function(){
			let valor = $(this).val();
			console.log("valor", valor);
			if (valor == 7) {
				$("#sub").addClass('d-block');
				$("#sub").removeClass('subcategoria');

			} else {
				$("#sub").removeClass('d-block');
				$("#sub").addClass('subcategoria');

				// $('.subscats').val("0");

				// $(".subscats").removeAttr("value");
			}
		});

		$('select#id_subcategoria').on('change',function(){
			let valor = $(this).val();
			console.log("valor", valor);
		});
		// $("#subcategoria-ropa").addClass('d-none');

	})

</script>



<?php require_once 'include/footer.php'; ?>

</body>



</html>

<?php ob_end_flush(); ?>