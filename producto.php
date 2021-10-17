<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){

		

	}

	$uid=$_SESSION['user'];

	require_once ('include/header.php');

	require_once ('include/dbconnect.php');

	

	if(strlen($uid)>0){

		

		$querytienda = "SELECT * FROM tiendas WHERE id_usuario = $uid  ORDER BY id_tienda DESC LIMIT 1";

		$resulttienda = mysqli_query($conn, $querytienda) or die("Falló la consulta $querytienda");

		$numero_filas = mysqli_num_rows($resulttienda);	

		if($numero_filas == 0){

			//header('Location: /cyc');

		}

		$rowtienda = mysqli_fetch_assoc($resulttienda);

		$ownertienda 	= $rowtienda['id_usuario'];

		

	}

	else{

		$ownertienda 	= 'NO';

	}





	

$id_producto = $_GET['id'];

$url = $_GET['url'];

if(strlen($url)<1){$url ='cyc';}

$int = intval($url);

$producto = $int;



$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$url = $uriSegments[3]; //

$int = intval($url);

$queryimg = "SELECT * FROM productos WHERE id_producto = $int OR url = '$url'";

	

						$resultimg = mysqli_query($conn, $queryimg) or die("Falló la consulta $queryimg");

						$numero_filas = mysqli_num_rows($resultimg);

							

							if($numero_filas == 0){

								//header('Location: /cyc');

							}

							

						$rowimg = mysqli_fetch_assoc($resultimg);

						

						$id_producto 	= $rowimg['id_producto'];

						$id_tienda 		= $rowimg['id_tienda'];

						$nombre			= $rowimg['nombre'];

						$resumen		= $rowimg['resumen'];

						$descripcion	= $rowimg['descripcion'];

						$url			= $rowimg['descripcion'];

						$precio1		= $rowimg['precio1'];

						$precio2		= $rowimg['precio2'];

						

						if($precio2 <1){

							

							$precios = '

									

									<h2 class="precio">$'.number_format($precio1, 2).' MXN</h4>

							';

							

							

						}

						

						else{

							

							$precios = '

								 <h4 ><del>$'.number_format($precio1, 2).'MXN</del></h4>

								<h2 class="precio">$'.number_format($precio2, 2).' MXN</h4>

							';

						}

						$imagen1		= $rowimg['img1'];

						$imagen2		= $rowimg['img2'];

						$imagen3		= $rowimg['img3'];

						

						$stylegal = '';



						if(	strlen($imagen1)>5){

							$imagen1 = '

							<li data-thumb="/cyc/'.$rowimg['img1'].'">

								<a data-fancybox="gallery" href="/cyc/'.$rowimg['img1'].'">

									<img id="zoom1" class="zoomimg" src="/cyc/'.$rowimg['img1'].'" data-zoom-image="/cyc/'.$rowimg['img1'].'" />

								</a>

							</li>';

						}

						if(	strlen($imagen2)>5){

							$imagen2 = '

							<li data-thumb="/cyc/'.$rowimg['img2'].'">

								<a data-fancybox="gallery" href="/cyc/'.$rowimg['img2'].'">

									<img id="zoom2" class="zoomimg" src="/cyc/'.$rowimg['img2'].'" data-zoom-image="/cyc/'.$rowimg['img2'].'" />

								</a>

							</li>';

						}

						if(	strlen($imagen3)>5){

							$imagen3 = '

							<li data-thumb="/cyc/'.$rowimg['img3'].'">

								<a data-fancybox="gallery" href="/cyc/'.$rowimg['img3'].'">

									<img id="zoom3" class="zoomimg" src="/cyc/'.$rowimg['img3'].'" data-zoom-image="/cyc/'.$rowimg['img3'].'" />

								</a>

							</li>';

						}

						

						if(strlen($imagen2) < 5 && strlen($imagen3) < 5 ){

							

							$stylegal= '

							.lSSlideOuter.vertical.noPager {

								padding-right: 0px !important;

								padding-left: 0 !important;

							}

							';

						}

						

?>

<style>

<?php echo $stylegal; ?>

html {

    width: 100%;

    margin: 0;

    padding: 0;

}

body{font-family: 'Open Sans', sans-serif; overflow-x:hidden;}

.navbar-inverse {

 background-color: #fff;

     border-color: transparent;

	 min-height: 100px;

}



.navbar-inverse .navbar-toggle {

    border-color: #da4536;

}

.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle {

    background-color: #da4536 !important;

border: none;

}

toggle {

    background-color: #da4536;

}



.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {

    background-color: #da4536;

}

.full-screen {

  background-size: cover;

  background-position: center;

  background-repeat: no-repeat;

}

.glyphicon-chevron-right:before, .glyphicon-chevron-left:before {

    color: #f0f0f0;

    content: ">";

    font-weight: lighter;

    font-family: 'Poppins', sans-serif;

	font-size: 2em;

}



.footmenu{width:20%; float:left;}



.cuenta-icon{width:30px; float: left; height:30px; background-image:url("/cyc/img/user.png"); background-size:100%; background-repeat:no-repeat; margin-top:-8px;}



.wish-icon{width:30px; float: left; height:30px; background-image:url("/cyc/img/wish.png"); background-size:100%; background-repeat:no-repeat; margin-top:-8px;}



.cart-icon{

width: 45px;

float: left;

height: 30px;

background-image: url("/cyc/img/cart.png");

background-size: 100%;

background-repeat: no-repeat;

margin-top: -15px;}



.navbar-form {

    padding: 3px 8px;

 

}

.carousel-inner {

    position: relative;

    width: 100%;

    overflow: hidden;

    max-height: 330px;

}





.glyphicon-chevron-left:before {



    content:  "\3C";

  

}

.navbar-nav > li {

    float: left;

    padding: 0 10px;

}

.navbar-inverse .navbar-nav>li>a {

    color: #222;

font-family: 'Open Sans', sans-serif;

font-size: 12px;

font-weight: 200;

text-transform: uppercase;

padding: 10px 0 2px 0;

}

.navbar-inverse .navbar-nav>li>a:focus, .navbar-inverse .navbar-nav>li>a:hover {

    color: #888;

    background-color: transparent;

}

img.logocyc {

    width: 50px;

}

.navbar-nav {

    float: left;

    margin: 0;

    bottom: 0;

    margin-top: 5px;

	padding-left: 20px;

}

.carousel {

position: relative;

margin-top: 0;

width: 100%;

float: left;

margin-bottom: 15px;

}

.categorias {

   position: relative;

margin-top: 125px;

width: 15%;

float: left;

}

.categorias h2 {

    background-color: #d9dadc;

    padding: 10px;

    font-size: 12px;

    font-weight: 500;

    margin: 0;

}

.footmenu{padding:10px;}

.footmenu h2 {

    color: #547dbf;

    font-size: 18px;

    font-weight: 600;

    padding: 10px 10px 5px 10px;

margin: 10px 0 0 0;

}



.footmenu li a {

    text-decoration: none;

    color: #222;

    font-size: 11px;

}



.carousel-inner > .item > a > img, .carousel-inner > .item > img {

    line-height: 1;

    width: 100%;

}







.footmenu li {

    list-style:none;

}

.vertodas{



    color: #333;

    font-size: 11px;

    padding: 0;

	padding-left:15px;

    margin: 0;

    line-height: 1.5;

    text-decoration: none;

}

.listado-cats a {color:#333;}

.listado-cats li{width:100%; color: #333; font-size:12px; list-style:none; }

ul.miniul {

    display: inline-block;

    padding: 3px 10px;

    margin: 0;

    font-size: 12px;



}



.item a{

    color: #fff;

   }

.miniul li {

    color: #fff;

    float: left;

    padding: 0 10px;

    list-style: none;

}

.miniul li a {

    color: #fff;

 

}

img.cartimg {

    width: 30px;

    margin-top: -5px;

}





img.avatar {

    width: 35px;

}

a.amicuenta {

    color: #333;

    font-size: 13px;

    text-align: left;

    float: right;

    padding: 0%;

    text-decoration: none;

    line-height: 1;

    width: 120px;

}

.fourprods .col-md-3 {

    padding: 0;

}

.fourprods .col-sm-3 img {

 padding-top: 0px;

 padding-bottom: 15px;

  padding-right: 15px;

}



@media (max-width:800px){

.navbar-brand {

    float: left;

    height: 50px;

    padding: 5px;



}

img.logocyc {

    width: 70px;

}



.carousel {

    position: relative;

    margin-top: 100px;

}

.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {

    border-color: transparent;

}

.search-container {

    float: none;

	    width: 90%;

}

.input-group {



    width: 100%;

}



a.amicuenta {

    float: left;



    width: 100%;

}



.avatarcont {

    text-align: right;

    padding: 0;

    width: 10%;

    float: left;

    min-width: 35px;

}



.myacont {

    width: 80%;

    float: left;

    margin-bottom: 20px;

}



.navbar-nav {



    margin-top: 10px;

}



.pagecont {

    width: 100%;

    padding: 15px!important;

	margin: 0;

}



.buttoncont {

    background-color: #d9dadc;

    padding: 6% 5%;

    min-height: auto!important;

    margin-bottom: 15px;

}



.bannercont{

    padding-left: 0!important;

    padding-right: 0!important;

}



.pagecont img {

    width: 100%;

    padding: 0!important;

	margin-bottom:15px;

}

.navbar-inverse .navbar-toggle {

    border-color: #aaa;

}

.navbar-toggle {



    margin-top: 15px;



}

}



.listado-footmenu {

    padding: 0 15px!important;

}



.h1-slide {

    text-align: center;

    color: #fff;

    font-weight: 600;

    font-size: 3em;

	padding: 0 15px;

	margin: 0;

}



.h2-slide {

    text-align: center;

    color: #fff;

    font-weight: 600;

    font-size: 1.8em;

	padding: 30px 15px;

	margin: 0;

}



.p-slide {

    

    color: #fff;

    font-weight: 200;

    font-size: 1.1em;

	padding: 0 15px;

	margin: 0;

	text-align:left;

}



.h4-slide {

    text-align: center;

    color: #fff;

    font-weight: 200;

    font-size: 1.5em;

	text-transform:uppercase;

	padding: 15px 15px 0 15px;

	margin: 15px 15px 0 15px;

}



.number-slide {

    display: inline-block;

    

    margin: 5px;

    width: 40px;

    height: 40px;

    color: #fff;

    background: transparent;

    border: 1px solid red;

    text-align: center;

    border-radius: 50%;

    font-weight: 600;

    font-size: 1.5em;

	line-height: 1.8;

}



.number-slide.activenumber {

    background: #ffbb57;

 

}

.numbers-wrap {

    position: relative;

    width: 100%;

    height: 55px;

    text-align: center;

    padding: 5px;

}



ul.listado-cats.desktop {

    padding: 10px 20px;

}







.cat-icon{display: inline-block; width:26px; height:24px; background-size:100%; background-repeat:no-repeat; }

.listado-cats  span{

    margin: 0;

    padding: 0;

    position: absolute;

    margin-top: 4px;

}





.btn-default {

    border: none;

}



.redbutton a{color:#fff;}





.navbar-nav {

    width: 90%;

}



.navbar-brand {

    padding: 10px 15px;

}

.navbar-inverse .navbar-nav > li > a {

    float: left;

}

.carousel-indicators {

    position: relative;

    bottom: 0px!important;

    padding: 10px;

}





.desktop{display:block;}

.tablet{display:none;}

.mobile{display:none;}





@media (max-width:800px){

.desktop{display:none;}

.mobile{display:block;}

.categorias {

    width: 100%;



}



.carousel {

    position: relative;

    margin-top: 10px;

    width: 100%;

}

.buttoncont{width:100%;}

.pagecont img {

    width: 50%;

    padding: 0 !important;

    margin-bottom: 15px;

}

.footmenu {

    padding: 10px;

    width: 100%;

    text-align: center;

}

#Banner2 .carousel-inner {

    padding: 15px 0!important;

}

.h4-slide {

    font-size: 1em;



}

.h1-slide {



    font-size: 1.5em;

}

.h2-slide {

    font-size: 1.2em;

}

.p-slide {

    font-size: .85em;

    padding: 0px 5px;



}

.pagecont {

    padding: 0px !important;

}

.carousel-inner {

    max-height:800px!important;

}



.carousel-inner > .item > a > img, .carousel-inner > .item > img {

    object-fit: cover;

    height: 150px;

}

.categorias {

    margin-top: 70px;

}

.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle {

    background-color: #333;

}



.navbar-nav > li {

    float: none;

    padding: 0 10px;

    width: 100%;

    text-align: left;

    display: inline-block;

}

.navbar-inverse .navbar-nav > li > a {

    float: left;

    width: 100%;

    padding: 8px 10px;

}

}



.card-grid .front, .card-grid .back {

    padding: 10px;

    text-align: center;

    border: 1px #333 solid;

}

.card-grid .back {

    background-color: #333;

    color: white;

}



.back {

    color: #333;

    background: #f0f0f0;

    padding: 40px 30px;

}

.back h2 {

    font-size: 20px;

}



.mainnav {

    padding: 0 15%;

}



.btn {

    padding: 7px 12px;

    font-size: 12px;



}



.lslide img {

    object-fit: contain;

    width: 100%;

}



.titleprod {

    color: #f5b417;

    font-weight: 600;

    text-align: left;

    padding: 0;

    font-size: 2em;

}



.nav-tabs { border-bottom: 2px solid #DDD; }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }

    .nav-tabs > li > a { border: none; color: #666; }

        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }

        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }

    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }

.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }

.tab-pane { padding: 15px 0; }

.tab-content{padding:20px}



.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }

@media(max-width:1024px){

.desktop{display:none;}

.tablet{display:block;}

.mainnav {

    padding: 0 5%;

}

.buybutton, .wishtbutton {

    margin: 10px 0;

    width: 100%;

}



.lSSlideOuter .lSGallery li {

    margin-bottom: 0;

    margin: 0 5px;

        margin-right: 5px;

}

.lSPager {width:100%!important;}

}



.contmain{

	margin-top:150px; margin-bottom:50px;

}

@media (max-width:800px){







.container {

    margin: 0 0px;

        margin-top: 0px;

        margin-bottom: 0px;

}

.navbar .container {

    margin: 0 15px;

       

}

.col-sm-6 {

    padding: 0;

}





.pagecont img {

    width: 100%;

}



.destcont .col-sm-12{padding:0;}

.prodcont {

    text-align: center;

}



.mainnav {

    padding: 0 1%;

}



.menu-tienda li {

    list-style: none;

    color: #fff;

    display: inline-block;

    padding: 5px 20px;

    width: 100%;

}



.input-group {

    position: relative;

    display: inline-block;

	}

.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {



    width: 50%;

}



.navbar-header {

    width: 100%;

}



.nav li:last-child {

    padding: 10px 0px 15px 0;

}



.logo-tienda{padding:0 10%; max-width: 70%;max-width: 70%;}

.mini-nav {

    min-height: 10px!important;



}

.navbar-inverse {

    min-height: 80px;

}



.navbar .container {

	margin: 0!important;

}

.contmain{

	margin-top: 70px !important; margin-bottom:50px;

}



.navbar-nav {

	width: 100%;

	margin: 0;

	padding: 0;

}

.navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {

	padding: 0;

}

.mobilemenu2 {

	background: #547dbf;

	color: #fff;

	margin-left: 0;

	width: 100% !important;

}

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





.popUp {

	position: fixed;

	width: 100%;

	height: 100%;

	background: rgba(0,0,0,.6);

	z-index: 9999;

	top: 0;

	display:none;

	text-align:center;

}

.popcont {

	width: 90%;

	background: #fff;

	margin: 5%;

	padding: 2.5%;

	max-width: 900px;

	text-align: right;

	padding-top: 25px;

	display: inline-block;

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

    .addwish:nth-child(1) {
    display: none!important;
}
</style>



    <!-- Page Content -->

    			<div class="container contmain">

			

			<div class="col-sm-6 col-md-6 desktop">

			

			    <ul id="vertical">

				  <?php echo $imagen1 . $imagen2 . $imagen3; ?>

				

				</ul>

					  

		   

		   </div>

		   

		   <div class="col-sm-6 col-md-6 tablet">

			

			    <ul id="verticalm">

				   <?php echo $imagen1 . $imagen2 . $imagen3; ?>

				</ul>

					  

		   

		   </div>

		   

		   <div class="col-sm-6 col-md-6 ">

		   <?php

		   

		   if( $_SESSION['user'] == $ownertienda){

			   

			    echo '<a class="editbtn" onclick="editPop('.$id_producto.');" googl="true">Editar producto</a>';

			   

		   }

		   

		   ?>

		   

		  

		   

		   <h1 class="titleprod"> <?php echo $nombre; ?></h1>

		  

		   <h4 class="titletab">Resumen del Producto</h4>

		    <p class="resumen">

			<?php echo $resumen; ?> 

		   

		   

		   </p>

		  

		  <?php echo $precios; 

		  

		  $idprodw = $id_producto;

				$iduserw = $_SESSION['user'];

				$numero_filasw = 0;

				if(strlen($iduserw)>0){

					$queryw = "SELECT * FROM wishlist WHERE id_producto = $idprodw AND id_usuario = $iduserw LIMIT 1";

				$resultw = mysqli_query($conn, $queryw) or die("Falló la consulta $queryimg");

				$numero_filasw = mysqli_num_rows($resultw);

				$numero_filasw = mysqli_num_rows($resultw);

					

				}

				

				// if($numero_filasw == 1){

				// 	$btnw = '<div class="removewish wishbuttton" data-idp ="'.$id_producto.'" data-idu ="'.$_SESSION['user'].'" data-idt ="'.$id_tienda.'"><span class="iconwish glyphicon glyphicon-heart"></span> <span class="textwish">Quitar de Wishlist</span></div>';

				// }

				// else{

				// 	$btnw = ' <div class="addwish wishbuttton" data-idp ="'.$id_producto.'" data-idu ="'.$_SESSION['user'].'" data-idt ="'.$id_tienda.'"><span class="iconwish glyphicon glyphicon glyphicon-heart-empty"></span> <span class="textwish">Añadir a Wishlist</span></div>';

				// }

		  ?>

		  

		  

		   

<?php
				//include('dbconnect.php');
				$btnw = "";
				$query = "SELECT * FROM productos WHERE id_producto = $id_producto";
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


					$btnc = ' <div class="agregar-carrito addcart" data-qty="1" id="' . openssl_encrypt($row["id_producto"], "AES-128-ECB", "conectaycompra") . '" data-idp ="' . $row['id_producto'] . '" data-idu ="' . $_SESSION['cartuser'] . '" data-idt ="' . $row['id_tienda'] . '"><span class="iconcart glyphicon  glyphicon-shopping-cart"></span> <span class="textcart">Añadir al Carrito</span></div>';


					echo '<div class="overlay">' . $btnc . $btnw . ' </div>';
				}

				?>

		   

		   </div>

		   

		   </div>

		   

		   

		   <div class="container" style="margin-bottom:60px;">

	<div class="row">

	

		                                <div class="col-md-12">

                                    <!-- Nav tabs --><div class="card">

                                    <ul class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalles del producto</a></li>

                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Valoraciones</a></li>

                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Envío y pago</a></li>

                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Reportar producto</a></li>

                                    </ul>



                                    <!-- Tab panes -->

                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="home">

										<h4 class="titletab">Detalles del Producto</h4>

										<?php $desc = $descripcion; ?>

			

										<?php 

										if(strlen($desc)<10){

											

											$desc = '<h3>Descripción</h3>';

											

										}

										

										if(strlen($desc)<10 && $_SESSION['user'] == $ownertienda){

											

											$desc = '<div class="contowner" onclick="editPop2(&quot;desc_prod?id='.$id_producto.'&quot;);"><p>Agrega una descripción  del producto <span>Aquí</span></p></div>';

											

										}

										if(strlen($desc)>10 && $_SESSION['user'] == $ownertienda){

											

											$desc = $descripcion;

											

											echo '<a class="editbtn" onclick="editPop2(&quot;desc_prod?id='.$id_producto.'&quot;);">Editar descripción</a>';

											

										}

										

										

										

										

										echo $desc;

										

										?>

										</div>

										

                                        <div role="tabpanel" class="tab-pane" id="profile">

										<h4 class="titletab">Valoraciones</h4>

										Sin valoraciones</div>

                                        <div role="tabpanel" class="tab-pane" id="messages">

										<h4 class="titletab">Envío y pago</h4>

										Ver detalles de envío <a href="/cyc/tarifas">aquí</a>.</div>

                                        <div role="tabpanel" class="tab-pane" id="settings">

										<h4 class="titletab">Reportar Producto</h4>

										¿Tienes algún problema con este producto? <br> Escríbenos <a href="/cyc/soporte">aquí</a>.</div>

                                    </div>

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

              



      <!--/Slider-->

<style class="cp-pen-styles">

.lSSlideOuter.vertical .lSGallery {

    min-height: 400px;

}

 .lSSlideOuter .lSGallery li {

    margin-bottom: 10px !important;

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

.activenum{background-color: #ffbb57!important;}



.bagimg{width:20%; float:left; padding:20px;  max-height: 300px;}

.bagimg img{width:100%; padding:0px;}



.menu-tienda{

list-style:none;

color:#fff;

padding: 0;

margin: 0;



}





.menu-tienda li{

list-style:none;

color:#fff;

display:inline-block;

padding:0 20px;

}



.menu-tienda li a{

list-style:none;

color:#fff;



}



.h1-tienda{color:#f5b417; font-weight:600; text-align:center; padding:0; margin:0; font-size:2em;}

.h3-tienda{color:#ffbb56;text-align:center; padding:0; margin:0; font-size:1.3em;}

.imgdest{

max-width: 100%;

padding: 7.5px 0;

}



.destcont {

    padding: 10px 0;

	

}

.imgprod {

    width: 100%;

    padding: 20px;

	transition: 1s ease all;

}



.imgprod:hover{opacity:.5; transition: 1s ease all;}

.prod-desc{

padding: 0 10px;

margin: 2px 0;

color: #222;

font-size: 13px;

}

.precio{color:#da4536; font-weight:600; font-size:1.6em;padding: 0;

margin: 2px 0; margin-bottom: 40px;}



.buybutton {

    min-width: 80px;

    padding: 13px 20px;

    text-align: center;

    border-radius: 3px;

    background-color: #179e59;

    color: #FFF;

    text-decoration: none;

    font-size: 15px;

	cursor:pointer;

}

.wishbuttton {

	min-width: 80px;

	padding: 13px 20px;

	text-align: center;

	border-radius: 3px;

	background-color: #F44336;

	color: #FFF;

	text-decoration: none;

	font-size: 15px;

	display: inline-block;

	cursor:pointer;

}



.buybutton:hover, .wishtbutton:hover{color:#f0f0f0; text-decoration:none;}

.lSSlideOuter.vertical .lSGallery {

    right: auto;

    left: 0;

}



@media (max-width:800px){

.bagimg{width:50%; float:left;}

.nav-tabs > li {

    width: 100%;

    text-align: center;

}

.nav li:last-child {

    float: right;

    margin-top: 0;

}

.nav li:last-child {

    padding: 0;

}

.buybutton, .wishtbutton {

    width: 100%;

    margin: 10px 0;

}



}



@media (max-width:500px){

.bagimg{width:100%; float:left;}

}





.desktop{display:block;}

.tablet{display:none;}

.mobile{display:none;}





@media (max-width:800px){

.desktop{display:none;}

.mobile{display:block;}

.categorias {

    width: 100%;



}





.btn {

    padding: 7px 12px;

    font-size: 12px;



}



.lslide img {

    object-fit: contain;

    width: 100%;

}



.titleprod {

    color: #f5b417;

    font-weight: 600;

    text-align: left;

    padding: 0;

    font-size: 2em;

}



.nav-tabs { border-bottom: 2px solid #DDD; }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }

    .nav-tabs > li > a { border: none; color: #666; }

        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }

        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }

    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }

.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }

.tab-pane { padding: 15px 0; }

.tab-content{padding:20px}



.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }

@media(max-width:1024px){

.desktop{display:none;}

.tablet{display:block;}

.mainnav {

    padding: 0 5%;

}

.buybutton, .wishtbutton {

    margin: 10px 0;

    width: 100%;

}



.lSSlideOuter .lSGallery li {

    margin-bottom: 0;

    margin: 0 5px;

        margin-right: 5px;

}

.lSPager {width:100%!important;}

}

@media (max-width:700px){







.container {

    margin: 0 0px;

        margin-top: 0px;

        margin-bottom: 0px;

}

.navbar .container {

    margin: 0 15px;

       

}

.col-sm-6 {

    padding: 0;

}





.pagecont img {

    width: 100%;

}



.destcont .col-sm-12{padding:0;}

.prodcont {

    text-align: center;

}



.mainnav {

    padding: 0 1%;

}



.menu-tienda li {

    list-style: none;

    color: #fff;

    display: inline-block;

    padding: 5px 20px;

    width: 100%;

}



.input-group {

    position: relative;

    display: inline-block;

	}

.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {



    width: 50%;

}



.navbar-header {

    width: 100%;

}



.nav li:last-child {

    padding: 10px 0px 15px 0;

}



.logo-tienda{padding:0 10%; max-width: 70%;max-width: 70%;}

.mini-nav {

    min-height: 10px!important;



}

.navbar-inverse {

    min-height: 80px;

}

}



.lSSlideOuter.vertical .lSGallery {

    min-height: 400px;

}

 .lSSlideOuter .lSGallery li {

    margin-bottom: 10px !important;

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

.activenum{background-color: #ffbb57!important;}



.bagimg{width:20%; float:left; padding:20px;  max-height: 300px;}

.bagimg img{width:100%; padding:0px;}



.menu-tienda{

list-style:none;

color:#fff;

padding: 0;

margin: 0;



}





.menu-tienda li{

list-style:none;

color:#fff;

display:inline-block;

padding:0 20px;

}



.menu-tienda li a{

list-style:none;

color:#fff;



}



.h1-tienda{color:#f5b417; font-weight:600; text-align:center; padding:0; margin:0; font-size:2em;}

.h3-tienda{color:#ffbb56;text-align:center; padding:0; margin:0; font-size:1.3em;}

.imgdest{

max-width: 100%;

padding: 7.5px 0;

}



.destcont {

    padding: 10px 0;

	

}

.imgprod {

    width: 100%;

    padding: 20px;

	transition: 1s ease all;

}



.imgprod:hover{opacity:.5; transition: 1s ease all;}

.prod-desc{

padding: 0 10px;

margin: 2px 0;

color: #222;

font-size: 13px;

}

.precio{color:#da4536; font-weight:600; font-size:1.6em;padding: 0;

margin: 2px 0; margin-bottom: 40px;}



.buybutton {

    min-width: 80px;

    padding: 13px 20px;

    text-align: center;

    border-radius: 3px;

    background-color: #179e59;

    color: #FFF;

    text-decoration: none;

    font-size: 18px;

}

.wishtbutton{

    min-width: 80px;

    padding: 13px 20px;

    text-align: center;

    border-radius: 3px;

    background-color: #F44336;

    color: #FFF;

    text-decoration: none;

    font-size: 18px;

}



.buybutton:hover, .wishtbutton:hover{color:#f0f0f0; text-decoration:none;}

.lSSlideOuter.vertical .lSGallery {

    right: auto;

    left: 0;

}



@media (max-width:800px){

.bagimg{width:50%; float:left;}

.nav-tabs > li {

    width: 100%;

    text-align: center;

}

.nav li:last-child {

    float: right;

    margin-top: 0;

}

.nav li:last-child {

    padding: 0;

}

.buybutton, .wishtbutton {

    width: 100%;

    margin: 10px 0;

}



}



@media (max-width:500px){

.bagimg{width:100%; float:left;}

}

</style>





    <!-- /.container -->



    <!-- jQuery -->

  



 

	<link type="text/css" rel="stylesheet" href="/cyc/css/lightslider.css" />                  

<script src="/cyc/js/lightslider.js"></script>

<script src="/cyc/js/jquery.elevatezoom.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>



<script>

      $(document).ready(function() {

        $('#vertical').lightSlider({

          gallery:true,

          item:1,

          vertical:true,

          verticalHeight:400,

          vThumbWidth:100,

          thumbItem:4,

          thumbMargin:0,

          slideMargin:0

        });  



		$('#verticalm').lightSlider({

          gallery:true,

          item:1,

          vertical:false,

          verticalHeight:400,

          vThumbWidth:30,

          thumbItem:4,

          thumbMargin:0,

          slideMargin:0

        });  

		

		//initiate the plugin and pass the id of the div containing gallery images



		

		

		$(".zoomimg").mouseover(function() {

        $(this).elevateZoom();

	



	}).mouseout(function() {



    



	});

	

	$('[data-fancybox]').fancybox({

	protect: true

});

	





      });



function editPop(prod){

	$("#frame").attr("src", "https://digitaltryout.com/cyc/editprod.php?id="+prod);

	openPop();

}

function editPop2(page){

	$("#frame").attr("src", "https://digitaltryout.com/cyc/wysiwyg/"+page);

	openPop();

}



function openPop(){

	$(".popUp").fadeIn();

}



function closePop(){

	$(".popUp").fadeOut();

}

  

</script>



	

<?php require_once 'include/footer.php'; ?>





</body>



</html>

<?php ob_end_flush(); ?>