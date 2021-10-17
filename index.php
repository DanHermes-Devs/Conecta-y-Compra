<?php

ob_start();
session_start();
require_once 'dbconnect.php';


// select loggedin users detail
$res = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res);

require_once 'include/header.php';
?>


<div class="categorias">
	<style>
		.url-cat img {
			width: 2rem;
		}

		.listado-cats {
			padding: 0 1rem 2rem 1rem;
		}

		.ocultar-sub {
			display: none;
		}

		.elemento-escondido {
			position: relative;
		}

		.mostrar-sub {
			background: #fff;
			padding: 2rem 3rem;
			position: absolute;
			right: -12rem;
			z-index: 1;
			top: -4rem;
		}

		.p-0,
		.m-0 {
			margin: 0;
			padding: 0;
		}

		.p-1 {
			padding: .1rem;
		}
	</style>

	<div class="listado-cats desktop">
		<?php

		$sqlCat = "SELECT id, nombre_cat, url_cat, icon_cat FROM categorias";
		$rsCat = mysqli_query($conn, $sqlCat); ?>

		<ul class="p-0 m-0">

			<?php

			while ($rowCat = mysqli_fetch_assoc($rsCat)) { ?>

				<li class="p-1">
					<a class="url-cat <?php echo $rowCat["url_cat"]; ?>" id="<?php echo $rowCat["url_cat"]; ?>" href="categoria.php?id=<?php echo $rowCat["id"]; ?>&categoria=<?php echo $rowCat["url_cat"]; ?>">
						<?php echo $rowCat["icon_cat"]; ?>
						<?php echo $rowCat["nombre_cat"]; ?></a>
					<br />
				</li>


				<?php

				if ($rowCat["nombre_cat"] == "Ropa, Zapatos y Accesorios") { ?>

					<ul>

						<?php
						$sqlSubCat = "SELECT subcategorias.*, categorias.* FROM subcategorias INNER JOIN categorias on (subcategorias.id_cat_subcat=categorias.id)";
						$rsSubCat = mysqli_query($conn, $sqlSubCat);


						while ($rowSubCat = mysqli_fetch_assoc($rsSubCat)) { ?>


							<li>
								<a class="url-cat <?php echo $rowSubCat["url_subcat"]; ?>" id="<?php echo $rowSubCat["id_subcat"]; ?>" href="categoria.php?idsubcategoria=<?php echo $rowSubCat["id_subcat"]; ?>&categoria=<?php echo $rowCat["url_cat"]; ?>&subcategoria=<?php echo $rowSubCat["url_subcat"]; ?>">
									<?php echo $rowSubCat["nombre_subcat"]; ?></a>
								<br />
							</li>

						<?php
						}
						?>

					</ul>
			<?php
				}
			}
			?>

		</ul>

	</div>

</div>



<div id="carousel-bounding-box">
	<div class="carousel slide" id="homeBanners">
		<!-- Carousel items -->

		<div class="carousel-inner">
			<div class="active item" data-slide-number="0">
				<img src="img/slider.jpg">
			</div>

			<div class="item" data-slide-number="1">
				<img src="img/slider.jpg">
			</div>




		</div>

		<!-- Carousel nav -->
		<a class="left carousel-control" href="#homeBanners" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#homeBanners" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<!--/Slider-->
<style class="cp-pen-styles">
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
		background-color: #547dbf !important;
	}

	.numbers-wrap {
		position: relative;
		width: 100%;
		height: 65px;
		text-align: center;
		padding: 15px;
	}

	.btnslider {

		background-color: #ed304c;
		color: #fff;
		font-weight: 600;
		margin-top: 0px;
		padding: 10px;
		position: absolute;
		margin: 0 auto;
		right: 0;
		left: 0;
		bottom: 2em;
		max-width: 300px;
		z-index: 3;
		display: none;

	}

	.btnslider a {

		color: #fff;
		text-decoration: none;

	}

	.linkslider {
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: 2;
	}

	@media(max-width:800px) {
		#carousel-bounding-box {
			width: 100%;
		}

		.container.pagecont {
			margin-top: 0px;
		}

		.slide1 {
			background-image: url(img/pasos/slide1m.png) !important;
		}

		.slide2 {
			background-image: url(img/pasos/slide2m.png) !important;
		}

		.slide3 {
			background-image: url(img/pasos/slide3m.png) !important;
		}

		.slide4 {
			background-image: url(img/pasos/slide4m.png) !important;
		}

		.slide5 {
			background-image: url(img/pasos/slide5m.png) !important;
		}

		#Banner2 .carousel-inner {
			padding: 0 !important;
			max-height: 430px !important;
		}

		#Banner2 .carousel-inner>.item {
			-webkit-transition: .6s ease-in-out left;
			-o-transition: .6s ease-in-out left;
			transition: .6s ease-in-out left;
			max-height: 430px !important;
			background-size: cover !important;
			background-repeat: no-repeat;
			/* background-color: #fff !important; */
			background-color: transparent !important;
			background-position: bottom !important;
		}
	}

	@media(max-width:500px) {
		#Banner2 .carousel-inner {
			padding: 0 !important;
			max-height: 230px !important;
		}

		#Banner2 .carousel-inner>.item {
			-webkit-transition: .6s ease-in-out left;
			-o-transition: .6s ease-in-out left;
			transition: .6s ease-in-out left;
			max-height: 230px !important;
			background-size: cover !important;
			background-repeat: no-repeat;
			/* background-color: #fff !important; */
			background-color: transparent !important;
			background-position: bottom !important;
		}
	}
</style>

<!-- Page Content -->
<div class="container pagecont" style="width: 100%;">
	<div class="d-flex">
		<a href="registro.php" class="register">REGISTRATE</a>
	</div>
	<div id="carousel-bounding-box">
		<div class="carousel slide" id="Banner2" style="width:100%; margin-top: 0;">
			<!-- Carousel item 1 -->
			<div class="carousel-inner" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf;">

				<div class="active item slide1" data-slide-number="0" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf; background-image:url(img/pasos/paso1.jpg); background-size:cover; background-position:center center;">
					<div class="col-sm-12 col-md-12 fourprods" style="padding:0; text-align: center;">

						<div class="numbers-wrap">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-numbers">
								<li data-target="#Banner2" data-slide-to="0" class="activenum">1</li>
								<li data-target="#Banner2" data-slide-to="1">2</li>
								<li data-target="#Banner2" data-slide-to="2">3</li>
								<li data-target="#Banner2" data-slide-to="3">4</li>
								<li data-target="#Banner2" data-slide-to="4">5</li>
							</ol>
						</div>


					</div>

					<div class="btn btn-default btnslider">
						<!-- <a href="#">INVITADOS</a> |  --><a href="miembros.php">MIEMBROS</a> | <a href="/cyc/registro.php">EQUIPO</a>
					</div>


				</div>


				<!-- Carousel item 2 -->

				<div class="item slide2" data-slide-number="1" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf; background-image:url(img/pasos/paso2.png); background-size:cover; background-position:center center;">
					<div class="col-sm-12 col-md-12 fourprods" style="padding:0; text-align: center;">

						<div class="numbers-wrap">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-numbers">
								<li data-target="#Banner2" data-slide-to="0">1</li>
								<li data-target="#Banner2" data-slide-to="1" class="activenum">2</li>
								<li data-target="#Banner2" data-slide-to="2">3</li>
								<li data-target="#Banner2" data-slide-to="3">4</li>
								<li data-target="#Banner2" data-slide-to="4">5</li>
							</ol>
						</div>

					</div>
					<div class="btn btn-default btnslider">
						<!-- <a href="#">INVITADOS</a> |  --><a href="miembros.php">MIEMBROS OK</a> | <a href="/cyc/registro.php">EQUIPO</a>
					</div>

				</div>

				<!-- Carousel item 3 -->
				<div class="item slide3" data-slide-number="2" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf; background-image:url(img/pasos/paso3.png); background-size:cover; background-position:center center;">
					<div class="col-sm-12 col-md-12 fourprods" style="padding:0; text-align: center;">


						<div class="numbers-wrap">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-numbers">
								<li data-target="#Banner2" data-slide-to="0">1</li>
								<li data-target="#Banner2" data-slide-to="1">2</li>
								<li data-target="#Banner2" data-slide-to="2" class="activenum">3</li>
								<li data-target="#Banner2" data-slide-to="3">4</li>
								<li data-target="#Banner2" data-slide-to="4">5</li>
							</ol>
						</div>


					</div>

					<div class="btn btn-default btnslider">
						<!-- <a href="#">INVITADOS</a> |  --><a href="miembros.php">MIEMBROS</a> | <a href="/cyc/registro.php">EQUIPO</a>
					</div>


				</div>




				<!-- Carousel item 4 -->


				<div class="item slide4" data-slide-number="3" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf; background-image:url(img/pasos/paso4.png); background-size:cover; background-position:center center;">
					<div class="col-sm-12 col-md-12 fourprods" style="padding:0; text-align: center;">



						<div class="numbers-wrap">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-numbers">
								<li data-target="#Banner2" data-slide-to="0">1</li>
								<li data-target="#Banner2" data-slide-to="1">2</li>
								<li data-target="#Banner2" data-slide-to="2">3</li>
								<li data-target="#Banner2" data-slide-to="3" class="activenum">4</li>
								<li data-target="#Banner2" data-slide-to="4">5</li>
							</ol>
						</div>


					</div>

					<div class="btn btn-default btnslider">
						<!-- <a href="#">INVITADOS</a> |  --><a href="miembros.php">MIEMBROS</a> | <a href="/cyc/equipo.php">EQUIPO</a>
					</div>


				</div>


				<div class="item slide5" data-slide-number="4" style="max-height: 680px; height:450px; cursor:pointer; background-color: #547dbf; background-image:url(img/pasos/paso5.jpg); background-size:cover; background-position:center center;">
					<div class="col-sm-12 col-md-12 fourprods" style="padding:0; text-align: center;">



						<div class="numbers-wrap">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-numbers">
								<li data-target="#Banner2" data-slide-to="0" style="color:#333">1</li>
								<li data-target="#Banner2" data-slide-to="1" style="color:#333">2</li>
								<li data-target="#Banner2" data-slide-to="2" style="color:#333">3</li>
								<li data-target="#Banner2" data-slide-to="3" style="color:#333">4</li>
								<li data-target="#Banner2" data-slide-to="4" style="color:#333" class="activenum">5</li>
							</ol>
						</div>





					</div>

					<div class="btn btn-default btnslider">
						<!-- <a href="#">INVITADOS</a> |  --><a href="miembros.php">MIEMBROS</a> | <a href="/cyc/equipo.php">EQUIPO</a>
					</div>


				</div>

				<a class="linkslider" data-fancybox="" data-ratio="2" href="https://www.youtube.com/watch?v=fo1qnagqKiU"></a>




				<!-- Carousel nav -->
				<a class="left carousel-control" href="#Banner2" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#Banner2" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>


		<div class="row" style="padding: 0 15px;">



			<div class="col-sm-4 col-md-4 buttoncont" style="background-color: #ffbb57;
							padding: 5.5% 2%;
							min-height: 340px;
							text-align: center;
							position: relative;
							float: left;">
				<p class="amicuenta" style="font-size: 28px;
							font-weight: 100;
							margin: 0;
							margin-bottom: 0px;
							line-height: 1;
							color: #fff;
							text-align: center;
							margin-bottom: 10px;
							line-height: 1;">Bienvenido</br> a tu mejor experiencia </p>
				<img src="img/logo_cyc.png" class="logoimg">

				<p class="amicuenta" style="    font-size: 15px;
							font-weight: 100; margin: 0;
							line-height: 1.4; text-alig:center; color:#fff;">Inicia sesión o regístrate </p>
				<div class="btn btn-default redbutton" STYLE="background-color: #ed304c;
							color: #fff;
							font-weight: 600;
							margin-top: 10px;
							padding: 10px;">
					<!-- <a href="/cyc/invitados.php">INVITADOS</a> |  --><a href="/cyc/miembros.php">MIEMBROS</a> | <a href="/cyc/equipo.php">EQUIPO</a>
				</div>

			</div>




			<div class="col-sm-12 col-md-8 bannercont escritorio desktop">
				<div class="col-sm-12 col-md-12 " style="padding-left: 0; margin-bottom: 15px;">
					<img class="imgcycs w72" src="img/banner1.jpg" style="width:100%;">
				</div>

				<div class="col-sm-12 col-md-12 fourprods" style="padding-left:0;">
					<div class="col-sm-3 col-md-3 first">
						<img class="imgcyc" src="img/banner2.jpg" style="width:100%;">
					</div>
					<div class="col-sm-3 col-md-3">
						<img class="imgcyc" src="img/banner3.jpg" style="width:100%;">
					</div>
					<div class="col-sm-3 col-md-3">
						<img class="imgcyc" src="img/banner4.jpg" style="width:100%;">
					</div>
					<div class="col-sm-3 col-md-3">
						<img class="imgcyc" src="img/banner5.jpg" style="width:100%;">
					</div>
				</div>

			</div>


			<div class="col-sm-12 col-md-8 bannercont mobile" style="margin-top: 15px;float: left;">
				<img class="imgcyc bannerm" src="img/banner1m.png" style="width:100%;">
				<img class="imgcyc bannerm" src="img/banner2m.png" style="width:100%;">
				<img class="imgcyc bannerm" src="img/banner3m.png" style="width:100%;">
				<img class="imgcyc bannerm" src="img/banner4-1m.png" style="width:50%;">
				<img class="imgcyc bannerm" src="img/banner4-2m.png" style="width:50%;">
				<img class="imgcyc bannerm" src="img/banner5m.png" style="width:100%;">
			</div>

		</div>

	</div>

	<style>
		.imgcyc.bannerm {
			margin-bottom: 15px !important;
			margin: 0 !important;
			margin-bottom: 15px !important;
			float: left;
		}

		.skipbtn {
			display: none;
			position: fixed;
			bottom: 0;
			margin: 0 auto;
			width: 100%;
			max-width: 350px;
			height: 40px;
			background-color: #ed304c;
			color: #fff;
			text-align: center;
			padding: 10px;
			border-radius: 10px 10px 0px 0px;
			font-weight: bold;
			left: 0;
			right: 0;
			cursor: pointer;
			text-decoration: none;
			transition: .35s all ease;
			background-image: url(img/skip.png);
			background-repeat: no-repeat;
			background-size: 30px;
			background-position: 90% center;
		}

		.skipbtn:focus,
		.skipbtn:hover {
			background-color: #ffbb57;
			color: #222 !important;
			text-decoration: none !important;
			transition: .35s all ease;
			background-position: 120% center;
		}

		.visibleskip {
			display: block !important;
			z-index: 999999;
		}

		.fourprods .col-sm-3 img {
			padding: 0 2.5%;
		}

		.first img {
			width: 100%;
			padding-left: 0;
			padding-bottom: 5% !important;
			width: 95% !important;
		}
	</style>
	<a class="skipbtn" data-fancybox-close="">SALTAR VIDEO</a>

	<a class="linkvideo" data-fancybox="" data-ratio="1" href="https://www.youtube.com/embed/E7cX5b8Kcz0" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></a>

	<?php require_once 'include/footer.php'; ?>

	<script>
		if (screen.width < 700) {
			var $wHeight = 150;
		} else {

			var $wHeight = 300;
		}
		jQuery(document).ready(function($) {

			$('.linkvideo').trigger('click');

			$('#Banner2').carousel({
				interval: 6000
			});
			$('#homeBanners').carousel({
				interval: 3000
			});

			$('#carousel-text').html($('#slide-content-0').html());

			//Handles the carousel thumbnails
			$('[id^=carousel-selector-]').click(function() {
				var id_selector = $(this).attr("id");
				var id = id_selector.substr(id_selector.length - 1);
				var id = parseInt(id);
				$('#Banner2').carousel(id);
			});

			//Handles the carousel links

			$('body').on('click', '.active', function(e) {
				if (e.target == this)

					// ... //
					$('.linkslider').trigger('click');
			});



			$('body').on('click', '.skipbtn', function(e) {
				$.fancybox.close(true);
			});


			// When the carousel slides, auto update the text
			$('#Banner2').on('slid', function(e) {
				var id = $('.item.active').data('slide-number');
				$('#carousel-text').html($('#slide-content-' + id).html());
			});
		});

		function c1goToSlide(number) {
			$("#Banner2").carousel(number);
		}

		function c2goToSlide(number) {
			$("#homeBanners").carousel(number);
		}



		function stickyInit() {

			function check_sticky() {
				if ($("#fancybox-container-1").hasClass("fancybox-is-open")) {
					$('.skipbtn').addClass('visibleskip');
				} else {
					$('.skipbtn').removeClass('visibleskip');
				}

			}

			window.setInterval(check_sticky, 500);
		}

		jQuery(document).ready(function() {

			stickyInit();

		});
	</script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

	<script>
		// $(document).ready(function(){
		// 	$(".ropa_zapatos_accesorios").mouseover(function(event){
		// 	   $("#capa").removeClass("ocultar-sub");
		// 	   $("#capa").addClass("mostrar-sub");
		// 	});

		// 	$(".ropa_zapatos_accesorios").mouseout(function(event){
		// 	   $("#capa").removeClass("mostrar-sub");
		// 	   $("#capa").addClass("ocultar-sub");
		// 	});
		// })
	</script>


	</body>

	</html>