<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
	$owner = true;
}

require_once('../include/header.php');
require_once('../include/dbconnect.php');

$id_tienda = $_GET['id'];

$url = $_GET['url'];
if (strlen($url) < 1) {
	$url = 'cyc';
}
$int = intval($url);
$tienda = $int;

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$url = $uriSegments[3]; //
$int = intval($url);
$queryimg = "SELECT * FROM tiendas WHERE id_tienda = $int OR url = '$url'";


// unset($_SESSION['arrCarrito']);
// unset($_SESSION['dataorden']);

$resultimg = mysqli_query($conn, $queryimg) or die("Falló la consulta $queryimg");
$numero_filas = mysqli_num_rows($resultimg);

if ($numero_filas == 0) {
	//header('Location: /cyc');
}



$rowimg = mysqli_fetch_assoc($resultimg);

$id_tienda 	= $rowimg['id_tienda'];
$ownertienda 	= $rowimg['id_usuario'];
$tipo 	        = $rowimg['tipo'];
$email 	        = $rowimg['email'];
$telefono 	    = $rowimg['telefono'];
$mapa 	        = $rowimg['mapa'];
$resumen_servicios 	= $rowimg['resumen_servicios'];
$detalles_servicios 	= $rowimg['detalles_servicios'];
$imagen1		= $rowimg['img1'];
$imagen2		= $rowimg['img2'];
$imagen3		= $rowimg['img3'];
$imagen4		= $rowimg['img4'];
$imagen5		= $rowimg['img5'];
$imagen6		= $rowimg['img6'];

if ($imagen1 == "") {
	$imagen1 = "placeholders/banner.png";
}
if ($imagen2 == "") {
	$imagen2 = "placeholders/logo.png";
}
if ($imagen3 == "") {
	$imagen3 = "placeholders/destacado.png";
}
if ($imagen4 == "") {
	$imagen4 = "placeholders/destacado_largo.png";
}
if ($imagen5 == "") {
	$imagen5 = "placeholders/destacado_largo.png";
}
if ($imagen6 == "") {
	$imagen6 = "placeholders/destacado.png";
}




?>


<!--/Slider-->
<style class="cp-pen-styles">
	.container.pagecont {
		margin-top: 150px !important;
		margin-bottom: 50px !important;
	}

	.carousel-indicators-numbers li {
		text-indent: 0;
		border-radius: 100%;
		color: #fff;
		-webkit-transition: all 0.25s ease;
		transition: all 0.25s ease;
		margin: 0 5px;
		width: 40px;
		height: 40px;
		font-size: 1.4em;
		line-height: 1.7;
		font-weight: 600;
		background-color: transparent;
		border: 1.5px solid #ed304c;
	}

	.carousel-indicators .active {
		width: 40px;
		height: 40px;
		margin: 0 5px;
	}

	.activenum {
		background-color: #ffbb57 !important;
	}

	.bagimg {
		width: 20%;
		float: left;
		padding: 20px;
		max-height: 300px;
	}

	.bagimg img {
		width: 100%;
		padding: 0px;
	}

	.menu-tienda {
		list-style: none;
		color: #fff;
		padding: 0;
		margin: 0;

	}

	.menu-tienda li {
		list-style: none;
		color: #fff;
		display: inline-block;
		padding: 0 20px;
	}

	.menu-tienda li a {
		list-style: none;
		color: #fff;

	}

	.mainbanner {
		height: 330px;
		background-size: cover;
		background-image: url('placeholders/banner.png');
		background-position: center center;
		margin-top: 120px;
	}

	.h1-tienda {
		color: #f5b417;
		font-weight: 600;
		text-align: center;
		padding: 20px 0 0 0;
		margin: 0;
		font-size: 2em;
	}

	.h3-tienda {
		color: #ffbb56;
		text-align: center;
		padding: 0;
		margin: 0;
		font-size: 1.3em;
	}

	.imgdest {
		max-width: 100%;
		padding: 0px 0;
	}

	.destcont {
		padding: 10px 0;

	}

	.prodsection {
		margin-bottom: 50px;
	}

	.imgprod {
		width: 100%;
		padding: 20px;
		transition: 1s ease all;
	}

	.imgprod:hover {
		opacity: .5;
		transition: 1s ease all;
	}

	.prod-desc {
		padding: 0 10px;
		margin: 2px 0;
		color: #222;
		font-size: 13px;
	}

	.precio {
		color: #da4536;
		font-weight: 600;
		font-size: 1.6em;
		padding: 0 10px;
		margin: 2px 0;
	}

	@media (max-width:800px) {
		.bagimg {
			width: 50%;
			float: left;
		}
	}

	@media (max-width:500px) {
		.bagimg {
			width: 100%;
			float: left;
		}
	}


	.col-big {
		position: relative;
		min-height: 1px;
		padding-right: 15px;
		padding-left: 15px;
		width: 20%;
	}

	.hovereffect {
		width: 100%;
		height: 100%;
		float: left;
		overflow: hidden;
		position: relative;
		text-align: center;
		cursor: default;
	}

	.hovereffect .overlay {
		width: 100%;
		height: 100%;
		position: absolute;
		overflow: hidden;
		top: 0;
		left: 0;
		display: inline-block;

		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
	}

	.hovereffect:hover .overlay {
		background-color: rgba(48, 152, 157, 0.4);
	}

	.hovereffect img {
		display: block;
		position: relative;
		width: 100%;
		object-fit: cover;
		object-position: center;
	}



	.hovereffect p.info {

		cursor: pointer;

		text-decoration: none;
		padding: 7px 14px;
		text-transform: uppercase;
		color: #fff;
		border: 1px solid #fff;
		background-color: transparent;
		opacity: 0;
		filter: alpha(opacity=0);
		-webkit-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		font-weight: normal;
		margin: auto;
		vertical-align: middle;
		display: flex;
		height: 100%;
		justify-content: center;
		align-items: center;
	}

	.hovereffect:hover p.info {
		opacity: 1;
		filter: alpha(opacity=100);
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}

	.hovereffect p.info:hover {
		box-shadow: 0 0 5px #fff;
	}

	.img1 {
		width: 100%;
		max-height: 400px;
		object-fit: cover;
		object-position: center;
	}

	.tooltip {
		position: relative;
		opacity: 1;
		text-align: center;
	}

	<?php

	if ($_SESSION['user'] != $ownertienda) {
		echo '
		
	.hovereffect .overlay {
	display: none;
	}
		';
	}

	if (isset($_SESSION['user'])) {
		echo '
		
.chaticon {
	position: fixed;
	z-index: 999999;
	width: 90px;
	height: 90px;
	background-image: url(../img/chat.png);
	bottom: 20px;
	right: 20px;
	background-color: #fff;
	background-size: 70%;
	background-repeat: no-repeat;
	background-position: center;
	border-radius: 50%;
	box-shadow: 0px 2px 3px #000;
	box-shadow: 0 4px 30px rgba(0,0,0,0.20);
	cursor:pointer;
}
		';
	}



	if ($_SESSION['user'] == $ownertienda) {
		echo '
		
.chaticon {
display:none;
}
		';
	}

	?>.chaticon {
		position: fixed;
		z-index: 999999;
		width: 90px;
		height: 90px;
		background-image: url(../img/chat.png);
		bottom: 20px;
		right: 20px;
		background-color: #fff;
		background-size: 70%;
		background-repeat: no-repeat;
		background-position: center;
		border-radius: 50%;
		box-shadow: 0px 2px 3px #000;
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.20);
		cursor: pointer;
	}

	.prodsection {
		margin-bottom: 50px;
		text-align: center;
	}

	.contowner {
		background: #f5f5f5;
		padding: 50px;
		width: 100%;
		border-radius: 30px;
		margin-bottom: 10%;
	}

	.contowner p {
		width: 100%;
		text-align: center;
		padding: 30px;
		border-radius: 30px;
		border: 4px dashed #cadae6;
		color: #545454;
		cursor: pointer;
	}

	.popUp {
		position: fixed;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, .6);
		z-index: 9999;
		top: 0;
		display: none;
	}

	.popcont {
		width: 90%;
		background: #fff;
		margin: 5%;
		padding: 2.5%;
		max-width: 900px;
		text-align: right;
		padding-top: 25px;
	}

	.closepop {
		font-size: 25px;
		font-family: Arial;
		margin-top: -1.5%;
		color: #666;
		cursor: pointer;
	}

	#frame {
		border: 0;
	}

	.editbtn {
		display: inline-block;
		width: 100%;
		background: #fff;
		padding: 10px;
		border-radius: 7px;
		color: #357388;
		border: 2px dashed #b2b9c5;
		text-align: right;
		cursor: pointer;
		margin-bottom: 0px;
	}

	.mapa iframe {
		max-width: 100%;
		min-width: 100%;
	}

	.contoverlay {
		position: relative;
	}

	.addcart,
	.removecart {
		background: #179e59;
		display: inline-block;
		color: #fff;
		padding: 10px;
		border-radius: 6px;
		margin: 5px 0 5px 2%;
		width: 48%;
		float: left;
		font-size: 11px;
		text-align: center;
		cursor: pointer;
	}

	.w-50 {
		width: 50%;
	}

	.addwish,
	.removewish {
		background: #F44336;
		display: inline-block;
		color: #fff;
		padding: 10px;
		border-radius: 6px;
		margin: 5px 0 5px 2%;
		width: 48%;
		float: left;
		font-size: 11px;
		text-align: center;
		cursor: pointer;
	}
</style>




<div class="container pagecont" style="width: 100%; padding: 0px 15px; margin-top: 50px;">

	<div class="hovereffect">
		<img class="img-responsive img1" src="<?php echo utf8_decode($imagen1); ?>" alt="">
		<div class="overlay">

			<p class="info" id="img1" onclick='UpdateImg(this.id)' ;>Da click para cambiar la imagen principal</a></p>
		</div>
	</div>



	<div class="col-sm-12 col-md-12" style="padding:20px; ">
		<center>
			<div style="width:100%; max-width:350px; margin-top:15px;">
				<div class="hovereffect">
					<img class="imgdest" src="<?php echo utf8_decode($imagen2); ?>">
					<div class="overlay">

						<p class="info" id="img2" onclick='UpdateImg(this.id)' ;>Da click para cambiar tu logo</a></p>
					</div>
				</div>

			</div>
		</center>


	</div>

	<div class="col-sm-12 col-md-12" style="padding:0;">

		<div class="col-sm-4 col-md-4 destcont">


			<div class="hovereffect">
				<img class="imgdest imgdest1" src="<?php echo utf8_decode($imagen3); ?>">
				<div class="overlay">

					<p class="info" id="img3" onclick='UpdateImg(this.id)' ;>Da click para cambiar la imagen destacada</a></p>
				</div>
			</div>

		</div>

		<div class="col-sm-4 col-md-4 destcont">
			<div class="col-sm-12 col-md-12" style="overflow: hidden;">
				<div class="hovereffect">
					<img class="imgdest imgdest2" src="<?php echo utf8_decode($imagen4); ?>">
					<div class="overlay">

						<p class="info" id="img4" onclick='UpdateImg(this.id)' ;>Da click para cambiar la imagen destacada</a></p>
					</div>
				</div>

			</div>
			<div class="col-sm-12 col-md-12" style="padding-top:15px; overflow: hidden;">
				<div class="hovereffect">
					<img class="imgdest imgdest3" src="<?php echo utf8_decode($imagen5); ?>">
					<div class="overlay">

						<p class="info" id="img5" onclick='UpdateImg(this.id)' ;>Da click para cambiar la imagen destacada</a></p>
					</div>
				</div>

			</div>

		</div>

		<div class="col-sm-4 col-md-4 destcont">
			<div class="hovereffect">
				<img class="imgdest imgdest4" src="<?php echo utf8_decode($imagen6); ?>">
				<div class="overlay">

					<p class="info" id="img6" onclick='UpdateImg(this.id)' ;>Da click para cambiar la imagen destacada</a></p>
				</div>
			</div>

		</div>


	</div>

	<?php if ($tipo == 'articulos') { ?>

		<div class="row prodsection">

			<div class="col-sm-12 col-md-12 containerprods" id="grid-productos">

				<h3 class="h3-tienda hidden">NUEVOS</h3>
				<h1 class="h1-tienda">PRODUCTOS</h1>

				<?php
				//include('dbconnect.php');
				$btnw = "";
				
				$query = "SELECT * FROM productos WHERE id_tienda = $id_tienda";
				$result = mysqli_query($conn, $query) or die("Falló la consulta $queryimg");
				while ($row = mysqli_fetch_assoc($result)) {
					// echo var_dump($row);
					$idprodw = $row['id_producto'];
					$iduserw = $_SESSION['user'];
					$numero_filasw = 0;
					if (strlen($iduserw) > 0) {
						$queryw = "SELECT * FROM wishlist WHERE id_producto = $idprodw AND id_usuario = $iduserw LIMIT 1";
						$resultw = mysqli_query($conn, $queryw) or die("Falló la consulta $queryimg");
						$numero_filasw = mysqli_num_rows($resultw);
					}

					if ($numero_filasw == 1) {
						$btnw = '<div class="removewish" data-idp ="' . $row['id_producto'] . '" data-idu ="' . $_SESSION['user'] . '" data-idt ="' . $row['id_tienda'] . '"><span class="iconwish glyphicon glyphicon-heart"></span> <span class="textwish">Quitar de Wishlist</span></div>';
					} else {
						$btnw = ' <div class="addwish" data-idp ="' . $row['id_producto'] . '" data-idu ="' . $_SESSION['user'] . '" data-idt ="' . $row['id_tienda'] . '"><span class="iconwish glyphicon glyphicon glyphicon-heart-empty"></span> <span class="textwish">Añadir a Wishlist</span></div>';
					}



					$idprodc = $row['id_producto'];
					$iduserc = $_SESSION['cartuser'];
					$numero_filasc = 0;
					if (strlen($iduserc) > 0) {
						$queryc = "SELECT * FROM cart WHERE id_producto = $idprodc AND id_usuario = '$iduserc' LIMIT 1";
						$resultc = mysqli_query($conn, $queryc) or die("Falló la consulta $queryc");
						$numero_filasc = mysqli_num_rows($resultc);
					}

					$btnc = ' <div class="agregar-carrito addcart" data-qty="1" id="' . openssl_encrypt($row["id_producto"], "AES-128-ECB", "conectaycompra") . '" data-idp ="' . $row['id_producto'] . '" data-idu ="' . $_SESSION['cartuser'] . '" data-idt ="' . $row['id_tienda'] . '"><span class="iconcart glyphicon  glyphicon-shopping-cart"></span> <span class="textcart">Añadir al Carrito</span></div>';
					// if($numero_filasc == 1){
					// 	$btnc = '<div class="removecart" data-idp ="'.$row['id_producto'].'" data-idu ="'.$_SESSION['cartuser'].'" data-idt ="'.$row['id_tienda'].'"><span class="iconcart glyphicon glyphicon glyphicon-remove"></span> <span class="textcart">Quitar del Carrito</span></div>';
					// }
					// else{
					// }

					echo '
           
			<div class="col-sm-3 col-md-3 prodcont" id="prod' . $row['id_producto'] . '" >
		   <div class="contoverlay">
		    <a href="/cyc/producto/' . $row['url'] . '"><img class="imgprod" src="/cyc/' . $row['img1'] . '"> </a>
		  
		   </div>
		    <a href="/cyc/producto/' . $row['url'] . '">
		   <p class="prod-desc">' . $row['nombre'] . '</h3>
		   <h4 class="precio">$' . number_format($row['precio2'], 2) . ' MXN</h4>
		    </a>
		   <div class="overlay">
			  
				' . $btnc . $btnw . '
			    
		   </div>
		   </div>
		   
            ';
				}

				?>





			</div>



		</div>

	<?php } ?>




	<?php if ($tipo == 'servicios') { ?>

		<div class="row prodsection containerprods" style="text-align:left;">

			<div class="col-sm-6">
				<?php $resumen = $resumen_servicios; ?>

				<?php
				if (strlen($resumen) < 10) {

					$resumen = '<h3>Resumen</h3>';
				}

				if (strlen($resumen) < 10 && $_SESSION['user'] == $ownertienda) {

					$resumen = '<div class="contowner" onclick="editPop(&quot;resumen_servicios?id=' . $id_tienda . '&quot;);"><p>Agrega una descripción (resumen) de tus servicios <span>Aquí</span></p></div>';
				}
				if (strlen($resumen) > 10 && $_SESSION['user'] == $ownertienda) {

					$resumen = $resumen_servicios;

					echo '<a class="editbtn" onclick="editPop(&quot;resumen_servicios?id=' . $id_tienda . '&quot;);">Editar resumen</a>';
				}




				echo $resumen;

				?>

				<h3>Datos</h3>
				<p>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
					Teléfono: <a href="tel:<?php echo $telefono; ?>"><?php echo $telefono; ?></a><br></p>

			</div>


			<div class="col-sm-6 mapa">
				<?php $map = $mapa; ?>

				<?php
				if (strlen($map) < 10) {

					$map = '<h3>Detalles</h3>';
				}

				if (strlen($map) < 10 && $_SESSION['user'] == $ownertienda) {

					$map = '<div class="contowner" onclick="editPop(&quot;mapa?id=' . $id_tienda . '&quot;);"><p>Agrega el mapa de tu negocio <span>Aquí</span></p></div>';
				}
				if (strlen($map) > 10 && $_SESSION['user'] == $ownertienda) {

					$map = $mapa;

					echo '<a class="editbtn" style="margin-top: 0px;" onclick="editPop(&quot;mapa?id=' . $id_tienda . '&quot;);">Editar mapa</a>';
				}


				echo $map;

				?>



			</div>


			<div class="col-sm-12">
				<?php $detalles = $detalles_servicios; ?>

				<?php
				if (strlen($resumen) < 10) {

					$detalles = '<h3>Detalles</h3>';
				}

				if (strlen($detalles) < 10 && $_SESSION['user'] == $ownertienda) {

					$detalles = '<div class="contowner" onclick="editPop(&quot;detalles_servicios?id=' . $id_tienda . '&quot;);"><p>Agrega una descripción completa de tus servicios <span>Aquí</span></p></div>';
				}
				if (strlen($detalles) > 10 && $_SESSION['user'] == $ownertienda) {

					$detalles = $detalles_servicios;

					echo '<a class="editbtn" style="margin-top: 40px;" onclick="editPop(&quot;detalles_servicios?id=' . $id_tienda . '&quot;);">Editar detalles</a>';
				}


				echo $detalles;

				?>



			</div>



		</div>

	<?php } ?>
</div>

<center>



	<div id="imageModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Actualizar Imagen</h4>
				</div>
				<div class="modal-body">
					<form name="bannerform" id="bannerform" onsubmit="return false" enctype="multipart/form-data" method="post">

						<div class="tooltip" title="Sube tu foto">

							<input type="file" name="uploadedimage" id="uploadedimage" class="inputfile inputfile-4 hidden" accept="image/x-png,image/jpeg" />
							<input type="hidden" name="banner" id="banner" class="typebanner" value="" />
							<input type="hidden" name="idtienda" id="idtienda" class="idtienda" value="<?php echo $id_tienda; ?>" />

							<label class="labelfile1" style="    width: 90%;text-align: center;    font-size: 10px;" for="uploadedimage"><img src="../img/picture.png" width="50px"><br><span style="color:#333;"></span></label>
						</div>


						<div id="respuestaimg" style="padding: 5px 5%; text-align: center;"></div>

						<button id="btnimg" onclick="cambiaImg(this.id)" type="submit" class="btn btn-primary btn-round buttonreg" style="display:none;">Actualizar</button>


					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<div class="popUp">
		<div class="popcont">
			<div class="closepop" onclick="closePop();">X</div>
			<div class="loadpage">
				<iframe id="frame" src="" width="100%" height="450">
				</iframe>
			</div>
		</div>
	</div>

</center>

<a href="chat?tienda=<?php echo $id_tienda; ?>" target="_blank">
	<div class="chaticon"></div>
</a>

<?php require_once '../include/footer.php'; ?>

<script>
	function UpdateImg(clicked_id) {
		var form = "#form" + clicked_id;
		var imgf = "#uploadedimage" + clicked_id;

		var modal = $('#imageModal');

		// change modal content
		modal.find('.buttonreg').attr("id", form);
		modal.find('.typebanner').attr("value", clicked_id);

		$('#imageModal').modal('show');


	}

	function cambiaImg() {
		$('body', window.parent.document).find("#uploadedimage").addClass("subirimgs");
		var selectorimg = $('body', window.parent.document).find("#uploadedimage");
		var uploadedimage = selectorimg.val();

		console.log(uploadedimage);

		if (uploadedimage == "") {
			$("#respuestaimg").html("<span style='color:#FA004B'>Por favor completa todos los campos</span>");
		} else {
			$.ajax({
				url: 'update.php',
				type: "POST",
				data: new FormData($("#bannerform")[0]),
				processData: false,
				contentType: false,
				success: function(data) {

					$('#respuestaimg').html(data);
					Limpiarimg();
					Cargarimg();

				}
			});

		}
	}




	$("#uploadedimage").change(function(objEvent) {
		cambiaImg();
	});




	function Cargarimg() {
		$('#datagridimg').html("<img src='loader.gif'><span> Por favor espera un momento</span>");
		$('#datagridimg').load('consultaimg.php');
	}

	function Limpiarimg() {
		$("#uploadedimage").val("");
		$("#url").val("");
	}
</script>

<script type="text/javascript">
	function equalheight() {
		var divHeight1 = $('.imgdest1').height();
		var halfheight = (divHeight1 / 2) - 7.5;

		$('.imgdest2').css('height', halfheight + 'px');
		$('.imgdest3').css('height', halfheight + 'px');
		$('.imgdest4').css('height', divHeight1 + 'px');

	}
	$(document).ready(function() {

		setTimeout(function() {
			equalheight();
		}, 1000);


	});

	$(window).on('resize', function() {
		equalheight();
	});

	function editPop(page) {
		$("#frame").attr("src", "https://digitaltryout.com/cyc/wysiwyg/" + page);
		openPop();
	}

	function openPop() {
		$(".popUp").fadeIn();
	}

	function closePop() {
		$(".popUp").fadeOut();
	}
</script>
</body>

</html>