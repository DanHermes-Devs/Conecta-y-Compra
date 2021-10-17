<?php
session_start();
include("dbconnect.php");
$uid2 = $_SESSION['user'];


$cantCarrito = 0;
if(isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0){
	sort($_SESSION['arrCarrito']);
	foreach($_SESSION['arrCarrito'] as $producto){
		$cantCarrito += $producto['cantidad'];
	}
}

if (strlen($uid2) > 0) {
	$logged = "logged";
	$_SESSION['cartuser'] = $uid2;
	setcookie("persistIDcart", $_SESSION['cartuser'], time() + (20 * 365 * 24 * 60 * 60), "/", null, null, true);
} else {
	$logged = "anon";
}

if (strlen($_SESSION['cartuser']) > 0) {
} else {
	$rand = substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz"), 0, 8);
	$_SESSION['cartuser'] = $rand;
	setcookie("persistIDcart", $_SESSION['cartuser'], time() + (20 * 365 * 24 * 60 * 60), "/", null, null, true);
}

if (strlen($_SESSION['user']) > 0 && strlen($_COOKIE['persistIDcart']) > 0) {
	$usercart = $_COOKIE['persistIDcart'];
	$userid = $_SESSION['user'];

	$queryu = "UPDATE cart SET id_usuario = '$userid' WHERE id_usuario = $usercart";
	$resultu = mysqli_query($conn, $queryu) or die("Falló la consulta $queryu");
	$_SESSION['cartuser'] = $userid;
}
$res2 = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario = " . $uid2 . "");
$userRow2 = mysqli_fetch_array($res2);




?>

<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/cyc/img/favicon.png">
	<title>Conecta y Compra</title>

	<!-- Bootstrap Core CSS -->


	<link href="/cyc/css/bootstrap.min.css" rel="stylesheet">
	<link href="/cyc/css/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="/cyc/css/waitMe.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">

	<!-- Custom CSS -->
	<link href="/cyc/css/one-page-wonder.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.2.4/balloon.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

	<!-- jQuery -->
	<script src="/cyc/js/jquery.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    	<!-- Scripts carrito de compras -->
    	<script src="/cyc/js/agregarCarrito.js" defer></script>

    </head>
    <style>
    .container.pagecont {
    	min-height: 45vh;
    }

    .splash {
    	width: 100%;
    	height: 100vh;
    	position: fixed;
    	top: 0;
    	background: url("/cyc/img/loader.gif");
    	background-repeat: no-repeat;
    	background-size: 190px;
    	background-position: center center;
    	z-index: 9999999999;
    	background-color: #fff;
    }




    html {
    	width: 100%;
    	padding: 0;
    	margin: 0;
    }

    body {
    	font-family: 'Open Sans', sans-serif;
    	overflow-x: hidden;
    }

    .navbar-inverse .navbar-toggle {
    	border-color: #da4536;
    }

    .navbar-inverse .navbar-toggle:focus,
    .navbar-inverse .navbar-toggle {
    	background-color: #da4536 !important;
    	border: none;
    }

    .toggle {
    	background-color: #da4536;
    }

    .navbar-inverse .navbar-toggle:focus,
    .navbar-inverse .navbar-toggle:hover {
    	background-color: #da4536;
    }

    .navbar-inverse {
    	background-color: #fff;
    	border-color: transparent;
    	min-height: 100px;
    }

    .full-screen {
    	background-size: cover;
    	background-position: center;
    	background-repeat: no-repeat;
    }

    .glyphicon-chevron-right:before,
    .glyphicon-chevron-left:before {
    	color: #f0f0f0;
    	content: ">";
    	font-weight: lighter;
    	font-family: 'Poppins', sans-serif;
    	font-size: 2em;
    }

    .bootstrap-tagsinput {
    	float: left;
    	width: 100%;
    	border-radius: 0px 4px 4px 0px;
    	text-align: left;
    }

    .footmenu {
    	width: 20%;
    	float: left;
    }

    .cuenta-icon {
    	width: 40px;
    	float: left;
    	height: 40px;
    	background-image: url("/cyc/img/user.png");
    	background-size: 100%;
    	background-repeat: no-repeat;
    	margin-top: -8px;
    }

    .wish-icon {
    	width: 40px;
    	float: left;
    	height: 40px;
    	background-image: url("/cyc/img/wish.png");
    	background-size: 100%;
    	background-repeat: no-repeat;
    	margin-top: -8px;
    }

    .cart-icon {
    	width: 60px;
    	float: left;
    	height: 40px;
    	background-image: url("/cyc/img/cart.png");
    	background-size: 100%;
    	background-repeat: no-repeat;
    	margin-top: -15px;
    }

    .navbar-form {
    	padding: 3px 8px;

    }

    .carousel-inner {
    	position: relative;
    	width: 100%;
    	overflow: hidden;
    	max-height: 350px;
    }


    .glyphicon-chevron-left:before {

    	content: "\3C";

    }

    .navbar-nav>li {
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

    .navbar-inverse .navbar-nav>li>a:focus,
    .navbar-inverse .navbar-nav>li>a:hover {
    	color: #888;
    	background-color: transparent;
    }

    img.logocyc {
    	width: 100px;
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
    	margin-top: 125px;
    	width: 85%;
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

    .footmenu {
    	padding: 10px;
    }

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

    .carousel-inner>.item>a>img,
    .carousel-inner>.item>img {
    	line-height: 1;
    	width: 100%;
    }

    #login-form {
    	margin: 5% auto;
    	max-width: 500px;
    }

    .footmenu li {
    	list-style: none;
    }

    .vertodas {

    	color: #333;
    	font-size: 11px;
    	padding: 0;
    	padding-left: 15px;
    	margin: 0;
    	line-height: 1.5;
    	text-decoration: none;
    }

    .listado-cats a {
    	color: #333;
    }

    .listado-cats li {
    	width: 100%;
    	color: #333;
    	font-size: 12px;
    	list-style: none;
    }

    ul.miniul {
    	display: inline-block;
    	padding: 3px 10px;
    	margin: 0;
    	font-size: 12px;

    }

    .item a {
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

    .btn-default.active.focus,
    .btn-default.active:focus,
    .btn-default.active:hover,
    .btn-default:active.focus,
    .btn-default:active:focus,
    .btn-default:active:hover,
    .open>.dropdown-toggle.btn-default.focus,
    .open>.dropdown-toggle.btn-default:focus,
    .open>.dropdown-toggle.btn-default:hover {
    	color: #333;
    	background-color: #ffbb57;
    	border-color: #ffbb57;
    }

    .btn-default {

    	color: #333;
    	background-color: #ffbb57;
    	;
    	border-color: #;
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

    body {
    	font-family: 'Open Sans', sans-serif !important;
    }

	/* @media (max-width:700px){
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
    margin-right: 0;
    margin-top: 3rem;
}
} */

.listado-footmenu {
	padding: 0 15px !important;
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
	text-align: left;
}

.h4-slide {
	text-align: center;
	color: #fff;
	font-weight: 200;
	font-size: 1.5em;
	text-transform: uppercase;
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

.navbar-inverse .navbar-nav>.open>a,
.navbar-inverse .navbar-nav>.open>a:focus,
.navbar-inverse .navbar-nav>.open>a:hover {
	color: #547DBF;
	background-color: #fff;
}

.cat-icon {
	display: inline-block;
	width: 26px;
	height: 24px;
	background-size: 100%;
	background-repeat: no-repeat;
}

.listado-cats span {
	margin: 0;
	padding: 0;
	position: absolute;
	margin-top: 4px;
}

.input-group {
	position: relative;
	display: table;
	border-collapse: separate;
	width: 100%;
}

.mujer-icon {
	background-image: url("/cyc/img/categorias-icons/mujer-icon.jpg");
}

.hombre-icon {
	background-image: url("/cyc/img/categorias-icons/hombre-icon.jpg");
}

.ninos-icon {
	background-image: url("/cyc/img/categorias-icons/ninos-icon.jpg");
}

.telefonia-icon {
	background-image: url("/cyc/img/categorias-icons/telefonia-icon.jpg");
}

.informatica-icon {
	background-image: url("/cyc/img/categorias-icons/informatica-icon.jpg");
}

.electronica-icon {
	background-image: url("/cyc/img/categorias-icons/electronica-icon.jpg");
}

.joyeria-icon {
	background-image: url("/cyc/img/categorias-icons/joyeria-icon.jpg");
}

.casa-icon {
	background-image: url("/cyc/img/categorias-icons/casa-icon.jpg");
}

.deportes-icon {
	background-image: url("/cyc/img/categorias-icons/deportes-icon.jpg");
}

.salud-icon {
	background-image: url("/cyc/img/categorias-icons/salud-icon.jpg");
}

.btn-default {
	border: none;
}

.redbutton a {
	color: #fff;
}

.navbar-nav {
	width: 90%;
}

.navbar-inverse .navbar-nav>li>a {
	float: left;
}

.carousel-indicators {
	position: relative;
	bottom: 0px !important;
	padding: 10px;
}

.imgcyc {
	transition: 1s ease all;
	cursor: pointer;
}

.imgcyc:hover {
	opacity: .5;
	transition: 1s ease all;
}

.imgcyc2 {
	transition: 1s ease all;
}

.imgcyc2:hover {
	opacity: .5;
	transition: 1s ease all;
}

.imgcycs {
	transition: 1s ease all;
	cursor: pointer;
}

.imgcycs:hover {
	opacity: .5;
	transition: 1s ease all;
}

.dropdown-menu {

	background: #547dbf;
	color: #fff;
	font-size: 12px;
	margin-top: 5px;
	right: 0;
	border: none;
	margin-left: 32px;
}

.dropdown-menu>li>a:focus,
.dropdown-menu>li>a:hover {
	color: #fff;
	text-decoration: none;
	background: #547dbf;
}

.h1cuenta {
	color: #547dbf;
	font-size: 2em;
	font-weight: 600;
	padding: 10px 10px 5px 10px;
	margin: 25px 0;
	text-align: center;
}

.h2form {
	color: #547dbf;
	font-size: 2em;
	font-weight: 600;
	padding: 10px 10px 5px 10px;
	margin: 10px 0 0 0;
	text-align: center;
}

.desktop {
	display: block;
}

.mobile {
	display: none;
}

td,
th {
	padding: 10px;
}

.h3int {
	color: #179e59;
	font-size: 1.3em;
	font-weight: 600;
	padding: 20px 20%;
	margin: 10px 0 0 0;
	text-align: center;
}

.search-container {
	width: 80%;
	float: left;
}

.navbar-header {
	float: left;
	width: 10%;
}

.navbar-brand {
	float: none;
}

.search-container .navbar-form .input-group {
	min-width: 100%;
}

.search-container .navbar-form .form-control {
	width: 30% !important;
	min-width: 300px;
}

.search-container .input-group .form-control,
.search-container .input-group-addon,
.search-container .input-group-btn {
	display: inline-block;
}

.search-container .input-group-btn>.btn {
	position: relative;
	border-radius: 0px 10px 10px 0px;
	padding: 7px 12px;
}

.navbar-nav {
	padding-left: 0;
}

.btnchat {
	background-color: #089c58;
	color: #fff;
}

.btnchat i {
	margin-right: 10px;
}

#inlinecart {
	display: none;
}

.imgcyc {
	cursor: pointer;
}

li.mobilemenu2 {
	display: none;
}

.collapse {
	display: block;
}

.container.pagecont {
	min-height: 45vh;
	padding: 0;
}

#carousel-bounding-box {
	margin-bottom: 12px;
}

.chaticon {
	display: none;
}

.circlenumber {
	background: rgba(0, 0, 0, .9);
	color: #fff;
	width: 30px;
	height: 30px;
	text-align: center;
	border-radius: 50%;
	/* padding: 10px; */
	float: left;
	position: absolute;
	/* margin-left: 10px; */
	line-height: 26px;
	font-size: 15px;
	top: -15px;
	margin-left: 50px;
	border: 1px solid;
}

.escritorio {
	padding-left: 15px;
	padding-right: 0;
}

.logo-responsive {
	width: 100%;
}

/*Tablet horizontal LG 1024px*/
@media (max-width: 1199px) and (min-width: 992px) {}

/*Tablet vertical MD 768px*/
@media (max-width: 991px) and (min-width: 768px) {
	.navbar-toggle {
		margin-right: 0;
		margin-top: 3rem;
	}

	.contenedor {
		margin-top: 15rem !important;
	}

	.contmain {
		margin-top: 12rem !important;
		margin-bottom: 50px;
	}

	.logo-responsive {
		width: 20% !important;
	}

	#login-form {
		margin: 0 auto;
		max-width: 500px;
	}

		/* #carousel-bounding-box {
		margin-bottom: 12px;
		margin-top: 4rem;
		} */
		.col-sm-8 {
			width: 100%;
		}

		.escritorio {
			padding-left: 0px !important;
		}

		.w72 {
			width: 72rem !important;
		}

		.navbar-toggle {
			display: block !important;
		}

		.collapse {
			display: none;
		}

		.navbar-collapse {
			/* display: block; */
			width: auto;
			border-top: 0;
			-webkit-box-shadow: none;
			box-shadow: none;
		}

		.navbar-header {
			width: 100%;
		}


		.input-group-btn {
			width: 10% !important;
		}

		.desktop {
			display: none;
		}

		.mobile {
			display: block;
			margin-top: 4rem !important;
		}

		.categorias {
			width: 100%;

		}

		.carousel {
			position: relative;
			margin-top: 10px;
			width: 100%;
		}

		.buttoncont {
			width: 100%;
		}

		.pagecont img {
			width: 50%;
			padding: 0 !important;
			/* margin-bottom: 15px; */
			margin: auto !important;
			display: flex;
		}

		.footmenu {
			padding: 10px;
			width: 100%;
			text-align: center;
		}

		#Banner2 .carousel-inner {
			padding: 15px 0 !important;
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
			max-height: 800px !important;
		}

		.carousel-inner>.item>a>img,
		.carousel-inner>.item>img {
			object-fit: cover;
			height: 150px;
		}

		.categorias {
			margin-top: 70px;
		}

		.navbar-inverse .navbar-toggle:focus,
		.navbar-inverse .navbar-toggle {
			background-color: #333;
		}

		.navbar-nav>li {
			float: none;
			padding: 0 10px;
			width: 100%;
			text-align: center;
			display: inline-block;
		}

		.navbar-inverse .navbar-nav>li>a {
			float: left;
			width: 100%;
			padding: 8px 10px;
		}

		li.mobilemenu2 {
			display: inline-block;
		}

		html,
		body {
			overflow-x: hidden;
		}

		.mobilemenu2 {
			display: block;
		}

		.fancybox-slide--iframe {
			padding: 0 !important;
		}

		.fancybox-slide--iframe .fancybox-content {
			background: transparent !important;
			height: 50% !important;
			margin-bottom: 44px;
			width: 100%;
		}

		.fancybox-slide--iframe .fancybox-content {
			max-width: 90% !important;
		}

		.fancybox-iframe,
		.fancybox-video {
			height: 50% !important;
		}

		#footergreen {
			text-align: center;
		}

		.linksfooter {
			width: 100%;
		}

		.mini-nav {
			display: none;
		}

		.btnchat {
			display: none;
		}

		.navbar-brand {
			float: left;
			height: auto;
			padding: 5px;
			display: inline-block;
		}

		.navbar .container {
			width: 100%;
			padding: 0;
			margin: 0;
		}

		.navbar-header {
			margin: 0 !important;
			padding: 15px;
		}

		.navbar-toggle {
			margin-right: 0;
		}

		.search-container {
			float: none;
			width: 100% !important;
			display: inline-block;
			padding: 0 2.5%;
			margin: 1rem 0 1rem 0;
		}

		.search-container .navbar-form .form-control {
			width: 90% !important;
			min-width: 90%;
		}

		.input-group-addon,
		.input-group-btn {
			width: 10%;
			white-space: nowrap;
			vertical-align: middle;
		}

		.search-container .input-group-btn>.btn {
			position: relative;
			border-radius: 0px 10px 10px 0px;
			padding: 7px 12px;
			width: 100%;
			padding: 7px 0;
		}

		.navbar-form {
			margin: 10px 0 0;
			padding: 0;
		}

		.navbar-fixed-bottom .navbar-collapse,
		.navbar-fixed-top .navbar-collapse {
			max-height: none;
			margin: 0;
		}

		.navbar-nav {
			width: 100%;
			margin-top: 0;
		}

		.navbar-nav>li {
			text-align: left;

		}

		.categorias {
			margin-top: 50px;
			display: inline-block;
			z-index: 99;
			float: left;
			padding: 0 2.5%;
		}

		.categorias h2 {
			display: none;
		}

		#carousel-bounding-box {
			display: inline-block;
			float: left;
		}

		.container.pagecont {
			float: left;
			display: inline-block;
		}

		.col-sm-12.col-md-12 {
			float: left;
			width: 100%;
		}

		.first img.imgcyc {
			width: 100% !important;
		}

		.carousel-indicators {
			position: absolute;
			bottom: 10px;
			left: 0;
			z-index: 15;
			width: 100%;
			padding-left: 0;
			margin-left: 0;
			text-align: center;
			list-style: none;
		}

		.carousel-indicators-numbers li {
			width: 30px !important;
			height: 30px !important;
			font-size: 15px !important;

		}

		#Banner2 {
			width: 100% !important;
			margin: 0 !important;
		}

		#Banner2 .carousel-inner {
			padding: 15px 0 !important;
			max-height: 200px !important;
		}

		#Banner2 .carousel-inner>.item {
			-webkit-transition: .6s ease-in-out left;
			-o-transition: .6s ease-in-out left;
			transition: .6s ease-in-out left;
			max-height: 200px !important;
			background-size: contain !important;
			background-repeat: no-repeat;
			background-color: #fff !important;
			background-color: transparent !important;
			background-position: bottom !important;
		}

		#Banner2 .carousel-inner {
			padding: 0 !important;
			background-color: #fff !important;
		}

		.carousel-indicators-numbers li {
			background-color: #ffbb57 !important;
			border: 0 !important;
			color: #fff !important;
			box-shadow: 1px 0px 5px #ccc;
		}

		li.activenum {
			background-color: #da4536 !important;
		}

		.mobilemenu2 {
			background: #547dbf;
			color: #fff;
			margin-left: -5%;
			width: 110% !important;
		}

		.miniul2 {
			margin: 0;
			padding: 0 5%;
			list-style: none;
		}

		.miniul2 li {
			width: 33.3%;
			display: inline-block;
			/* color: #fff; */
			float: left;
			text-align: center;
			padding: 5px;
		}

		.miniul2 li a {
			color: #fff;
			font-weight: 100;
		}

		.miniul2 li.midw {
			width: 50%;
		}

		.titlemain {
			padding: 0px 5% 15px 5% !important;
			font-size: 25px;
			margin-top: 0;
		}

		.container.pagecont {
			margin-top: 70px;
		}

		.navbar-inverse {
			background-color: #fff;
			border-color: transparent;
			min-height: 100px;
			z-index: 333;
			position: fixed;
			overflow-x: hidden;
			box-shadow: -10px 1px 15px rgba(0, 0, 0, .2);
		}

		.h2form {
			padding: 0 5% 5% !important;
		}

		.pagecont .container {
			padding-top: 0 !important;
		}

		.pagecont .container .col-md-12 {
			padding: 0;
		}

		.h2form {
			padding: 0 5% 5% !important;
			font-size: 22px;
		}

		.h3int {
			color: #179e59;
			font-size: 100%;
			font-weight: 600;
			padding: 0px 10% 30px;
			margin: 0px 0 0 0;
			text-align: center;
		}

		#inlinecartbody .container {
			margin: 0;
			padding: 0;
		}

		#inlinecartbody table {
			width: 100%;
			min-width: 100%;
			font-size: 60%;
		}

		#inlinecart .imgprod,
		.checkout .imgprod {
			max-width: 100%;
			padding: 0;
			border-radius: 10px;
			max-width: 130px;
		}

		#inlinecartbody {
			position: relative;
			padding: 15px;
			max-height: 72vh;
			overflow: auto;
			padding: 0;
		}

		.search-container .input-group-btn>.btn {
			height: 34px;
			background: #ffbb57;
		}

		.container {
			margin: 0 !important;
		}
	}

	/*Movil horizontal SM 576px*/
	@media (max-width: 767px) and (min-width: 576px) {}

	/*Movil Vertical 320px*/
	@media (max-width: 800px) {
		img.logocyc {
			width: 75px !important;
		}

		.sello-logo-img {
			width: 60px !important;
		}

		#vercart2 {
			margin-top: 30px;
		}

		.circlenumber {
			background: #ffbb57;
			color: #333;
			width: 25px;
			height: 25px;
			text-align: center;
			border-radius: 50%;
			/* padding: 10px; */
			float: left;
			position: absolute;
			/* margin-left: 10px; */
			line-height: 26px;
			font-size: 12px;
			top: -20px;
			margin-left: 50px;
			border: 0;
		}

		.navbar-form {
			border-top: 0;
			border-bottom: 0;
			-webkit-box-shadow: none;
			box-shadow: none;
		}

		.navbar-inverse .navbar-nav>li>a {
			padding-bottom: 0 !important;
			padding-top: 0 !important;
			font-size: 11px;
		}

		.div60 {
			width: 60%;
			float: left;
			padding: 10px;
			font-size: 12px;
			color: #2222;
		}

		.div40 {
			width: 40%;
			float: left;
			padding: 10px;
			padding-top: 33px;
		}

		.div60 a {
			color: ;
			color: #333;
			margin: 1.5px 0;
			display: inline-block;
			font-size: 12px;
			text-decoration: none;
		}

		.div40 a {
			color: #333;
			font-size: 12px;
			width: 100%;
			display: inline-block;
		}

		.open>.dropdown-menu {
			margin-left: 0;
		}

		.navbar-nav .open .dropdown-menu .dropdown-header,
		.navbar-nav .open .dropdown-menu>li>a {
			padding: 2px 0;
			font-size: 11px;
			color: #333 !important;
		}

		.open>.dropdown-menu {
			display: block;
			margin-bottom: 30px;
		}

		.navbar-inverse {
			position: relative !important;
		}

		body {
			margin-top: 0 !important;
		}

		.categorias {
			margin-top: 0 !important;
		}

		.selectcat {
			width: 95%;
			margin: 10px 2.5%;
			margin-bottom: 0;
		}

		.navbar {
			margin-bottom: 0 !important;
		}

		.carousel {
			margin-top: 0 !important;
		}


		.navbar-toggle {
			display: none !important;
		}

		.container {
			margin: 0 !important;
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
			background-position: 72% center !important;
		}

		.register {
			background-color: #ed304c;
			color: #fff;
			font-weight: 600;
			padding: 10px;
			border: none;
			width: 50%;
			text-align: center;
		}

		.d-flex {
			display: flex;
			justify-content: center;
			margin-bottom: 3rem;
		}

		.fancybox-slide--iframe .fancybox-content {
			background: #fff;
			height: calc(100% - 44px);
			margin-bottom: 0 !important;
			margin-top: 25% !important;
		}

		.search-container .navbar-form .input-group {
			display: flex !important;
		}

		.collapse {
			display: none;
		}

		.btnchat {
			display: block !important;
			margin-left: 10px !important;
		}

		.navbar-collapse {
			/* display: block; */
			width: auto;
			border-top: 0;
			-webkit-box-shadow: none;
			box-shadow: none;
		}

		.navbar-header {
			width: 100%;
		}


		.input-group-btn {
			width: 10% !important;
		}

		.desktop {
			display: none;
		}

		.mobile {
			display: block;
		}

		.categorias {
			width: 100%;

		}

		.carousel {
			position: relative;
			margin-top: 10px;
			width: 100%;
		}

		.buttoncont {
			width: 100%;
		}

		.pagecont img {
			width: 50%;
			padding: 0 !important;
			/* margin-bottom: 15px; */
			margin: auto !important;
			display: flex;
		}

		.footmenu {
			padding: 10px;
			width: 100%;
			text-align: center;
		}

		#Banner2 .carousel-inner {
			padding: 15px 0 !important;
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
			max-height: 800px !important;
		}

		.carousel-inner>.item>a>img,
		.carousel-inner>.item>img {
			object-fit: cover;
			height: 150px;
		}

		.categorias {
			margin-top: 70px;
		}

		.navbar-inverse .navbar-toggle:focus,
		.navbar-inverse .navbar-toggle {
			background-color: #333;
		}

		.navbar-nav>li {
			float: none;
			padding: 0 10px;
			width: 100%;
			text-align: center;
			display: inline-block;
		}

		.navbar-inverse .navbar-nav>li>a {
			float: left;
			width: 100%;
			padding: 8px 10px;
		}

		li.mobilemenu2 {
			display: inline-block;
		}

		html,
		body {
			overflow-x: hidden;
		}

		.mobilemenu2 {
			display: block;
		}

		.fancybox-slide--iframe {
			padding: 0 !important;
		}

		.fancybox-slide--iframe .fancybox-content {
			background: transparent !important;
			height: 50% !important;
			margin-bottom: 44px;
			width: 100%;
		}

		.fancybox-slide--iframe .fancybox-content {
			max-width: 90% !important;
		}

		.fancybox-iframe,
		.fancybox-video {
			height: 50% !important;
		}

		#footergreen {
			text-align: center;
		}

		.linksfooter {
			width: 100%;
		}

		.mini-nav {
			display: none;
		}

		.btnchat {
			display: none;
		}

		.navbar-brand {
			float: left;
			height: auto;
			padding: 5px;
			display: inline-block;
		}

		.navbar .container {
			width: 100%;
			padding: 0;
			margin: 0;
		}

		.navbar-header {
			margin: 0 !important;
			padding: 15px;
		}

		.navbar-toggle {
			margin-right: 0;
		}

		.search-container {
			float: none;
			width: 100% !important;
			display: inline-block;
			padding: 0 2.5%;
		}

		.search-container .navbar-form .form-control {
			width: 90% !important;
			min-width: 45%;
		}

		.input-group-addon,
		.input-group-btn {
			width: 10%;
			white-space: nowrap;
			vertical-align: middle;
		}

		.search-container .input-group-btn>.btn {
			position: relative;
			border-radius: 0px 10px 10px 0px;
			width: 100%;
		}

		.navbar-form {
			margin: 10px 0 0;
			padding: 0;
		}

		.navbar-fixed-bottom .navbar-collapse,
		.navbar-fixed-top .navbar-collapse {
			max-height: none;
			margin: 0;
		}

		.navbar-nav {
			width: 100%;
			margin-top: 0;
		}

		.navbar-nav>li {
			text-align: left;

		}

		.categorias {
			margin-top: 50px;
			display: inline-block;
			z-index: 99;
			float: left;
			padding: 0 2.5%;
		}

		.categorias h2 {
			display: none;
		}

		#carousel-bounding-box {
			display: inline-block;
			float: left;
		}

		.container.pagecont {
			float: left;
			display: inline-block;
		}

		.col-sm-12.col-md-12 {
			float: left;
			width: 100%;
		}

		.first img.imgcyc {
			width: 100% !important;
		}

		.carousel-indicators {
			position: absolute;
			bottom: 10px;
			left: 0;
			z-index: 15;
			width: 100%;
			padding-left: 0;
			margin-left: 0;
			text-align: center;
			list-style: none;
		}

		.carousel-indicators-numbers li {
			width: 30px !important;
			height: 30px !important;
			font-size: 15px !important;

		}

		#Banner2 {
			width: 100% !important;
			margin: 0 !important;
		}

		#Banner2 .carousel-inner {
			padding: 15px 0 !important;
			max-height: 200px !important;
		}

		#Banner2 .carousel-inner>.item {
			-webkit-transition: .6s ease-in-out left;
			-o-transition: .6s ease-in-out left;
			transition: .6s ease-in-out left;
			max-height: 200px !important;
			background-size: contain !important;
			background-repeat: no-repeat;
			background-color: #fff !important;
			background-color: transparent !important;
			background-position: bottom !important;
		}

		#Banner2 .carousel-inner {
			padding: 0 !important;
			background-color: #fff !important;
		}

		.carousel-indicators-numbers li {
			background-color: #ffbb57 !important;
			border: 0 !important;
			color: #fff !important;
			box-shadow: 1px 0px 5px #ccc;
		}

		li.activenum {
			background-color: #da4536 !important;
		}

		.mobilemenu2 {
			background: #547dbf;
			color: #fff;
			margin-left: -5%;
			width: 110% !important;
		}

		.miniul2 {
			margin: 0;
			padding: 0 5%;
			list-style: none;
		}

		.miniul2 li {
			width: 33.3%;
			display: inline-block;
			/* color: #fff; */
			float: left;
			text-align: center;
			padding: 5px;
		}

		.miniul2 li a {
			color: #fff;
			font-weight: 100;
		}

		.miniul2 li.midw {
			width: 50%;
		}

		.titlemain {
			padding: 0px 5% 15px 5% !important;
			font-size: 25px;
			margin-top: 0;
		}

		.container.pagecont {
			margin-top: 70px;
		}

		.navbar-inverse {
			background-color: #fff;
			border-color: transparent;
			min-height: 100px;
			z-index: 333;
			position: fixed;
			overflow-x: hidden;
			box-shadow: -10px 1px 15px rgba(0, 0, 0, .2);
		}

		.h2form {
			padding: 0 5% 5% !important;
		}

		.pagecont .container {
			padding-top: 0 !important;
		}

		.pagecont .container .col-md-12 {
			padding: 0;
		}

		.h2form {
			padding: 0 5% 5% !important;
			font-size: 22px;
		}

		.h3int {
			color: #179e59;
			font-size: 100%;
			font-weight: 600;
			padding: 0px 10% 30px;
			margin: 0px 0 0 0;
			text-align: center;
		}

		#inlinecartbody .container {
			margin: 0;
			padding: 0;
		}

		#inlinecartbody table {
			width: 100%;
			min-width: 100%;
			font-size: 60%;
		}

		#inlinecart .imgprod,
		.checkout .imgprod {
			max-width: 100%;
			padding: 0;
			border-radius: 10px;
			max-width: 130px;
		}

		#inlinecartbody {
			position: relative;
			padding: 15px;
			max-height: 72vh;
			overflow: auto;
			padding: 0;
		}

		.search-container .input-group-btn>.btn {
			height: 34px;
			background: #ffbb57;
		}
	}

	/* Carrito de compras */
	table {

		width: 100%;

		min-width: 200px;

		font-size: 12px;

	}



	#inlinecart {

		background: transparent;

		color: #333;

		font-size: 1.4em;

	}



	#inlinecart .imgprod,
	.checkout .imgprod {

		max-width: 100%;

		padding: 10px;

		border-radius: 20px;

		max-width: 130px;

	}



	.infopoints {
		width: 50%;
		float: left;
		padding: 10px 0;
		font-size: .8em;
	}

	.brown1 {
		color: #6a504f;
	}



	.modal-body {

		position: relative;

		padding: 15px;

		max-height: 72vh;

		overflow: auto;

	}



/* .containerprods {

padding: 0 10%;

} */



.imgprod.tdimg {

	padding: 0 !important;

	width: 50px;

	height: 50px;

	border-radius: 5px !important;

	object-fit: cover;

	object-position: center;



}



.nowish {

	width: 100%;

	text-align: center;

	padding: 5%;

	border: 3px dashed #eaeaea;

	border-radius: 20px;

	background: #fbfbfb;

	line-height: 1.6;

	color: #646464;

	font-size: 20px;

}



.nowish .glyphicon {

	color: #da4536;

	font-size: 40px;

}
</style>

<body class="<?php echo $logged; ?>">
	<div class="splash"></div>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="mini-nav" style="min-height:30px;background-color:#547dbf; text-align:right;     padding: 0 5%;">
			<ul class="miniul">


				<?php
				$text = $userRow2['nombre'];
				$words = str_word_count($text, 1);
				$nombreuser = $words[0];

				?>





				<?php if ($_SESSION['user']) : ?>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
							<span class='glyphicon glyphicon-user'></span>&nbsp; Bienvenido <?php echo $nombreuser; ?>&nbsp;<span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='/cyc/logout?logout'><span class='glyphicon glyphicon-log-out'></span>&nbsp;Cerrar sesión</a></li>
							</ul>
						</li>

					<?php else : ?>
						<li>
							<a href='/cyc/registro'>Regístrate</a>
						</li>
						<li>
							<a href='/cyc/invitados'>Invitados</a>
						</li>
						<li>
							<a href='/cyc/login'>Miembros</a>
						</li>
						<li style="display: none;">
							<a href='/cyc/login_equipo'>Equipo</a>
						</li>
						<li>
							<a href='/cyc/registro-vendedor'>Deseo ser Vendedor</a>
						</li>
						<li>
							<a href='/cyc/tarifas'>Envíos</a>
						</li>
					<?php endif; ?>




				</ul>
			</div>
			<div class="container" style="width:100%;">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="col-xs-4 col-sm-4">
						<a class="navbar-brand" href="/cyc/"><img src="/cyc/img/logo_cyc.png" class="logocyc"></a>
					</div>
					<div class="col-xs-4 col-sm-4">
						<div class="sello-logo">
							<img src="/cyc/img/logo_temp.png" class="sello-logo-img">
						</div>
					</div>
					<div class="col-xs-4 col-sm-4">
						<a class="mobile" data-balloon="Ver mi pedido" data-balloon-pos="down" id="vercart2" data-toggle="modal" data-target="#inlinecart" role='button' style="font-weight:600" onclick="verCart();">
							<div class="cart-icon"></div>
							<div class="circlenumber" data-notify="0"></div>
						</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>

				<div class="search-container">
					<form class="navbar-form" role="search" action="search.php" method="GET">
						<div class="input-group">
							<input type="text" class="form-control" name="q" placeholder="Estoy buscando...">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<a href="javascript:void(Tawk_API.toggle())" class="btn btn-default btnchat"><i class="glyphicon glyphicon-comment"></i>Chat en línea</a>
						</div>
					</form>
				</div>

				<select class="form-control mobile selectcat">
					<option value="" selected="selected">Selecciona una categoría</option>

					<option value="#">Mujer</option>
					<option value="#">Hombre</option>
					<option value="#">Niños</option>
					<option value="#">Telefonía</option>
					<option value="#">Informática</option>
					<option value="#">Electrónica´</option>
					<option value="#">Joyería y relojes</option>
					<option value="#">Casa y jardín</option>
					<option value="#">Deportes y ocio</option>
					<option value="#">Salud y belleza</option>
				</select>

				<ul class="nav navbar-nav mobile">
					<div class="div60">
						<li>
							<a href="/cyc/" style="font-weight:600" googl="true">HOME</a>
						</li>
						<li>
							<a href="/cyc/cyc-articulos" style="border-bottom:2px solid #ffba56;">CONECTA Y COMPRA ARTÍCULOS</a>
						</li>
						<li>
							<a href="/cyc/cyc-servicios" style="border-bottom:2px solid #169e58;">CONECTA Y COMPRA SERVICIOS</a>
						</li>
						<li>
							<a href="/cyc/cyc-aprende" style="border-bottom:2px solid #547dbf;">CONECTA, COMPRA Y APRENDE </a>
						</li>
					</div>

					<div class="div40">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:600">

								<?php if ($_SESSION['user']) { ?>
									<div class="cuenta-icon"></div>TU CUENTA<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" style="background:#fff; color: #222;">
									<li><a href="/cyc/cuenta">&nbsp;VER PERFIL</a></li>


									<?php

									if ($userRow2["suscripcion"] == 1) { ?>
										<li><a href="/cyc/crea-tienda">&nbsp;CREA TU TIENDA</a></li>
										<li><a href="/cyc/tiendas">&nbsp;MIS TIENDAS</a></li>
										<li><a href="/cyc/mis-productos">&nbsp;MIS PRODUCTOS</a></li>
									<?php } else if ($userRow2["suscripcion"] == 2) {
										echo "Hola cliente";
									}
									?>



									<li><a href="/cyc/pedidos">&nbsp;MIS PEDIDOS</a></li>
									<li style="float:left; width: 100%;"><a href="configuracion">CONFIGURACIÓN</a></li>
								</ul>
							<?php } else { ?>
								<a href="/cyc/login?p=cuenta" style="font-weight: bold;">&nbsp;Inicia Sesión</a>
							</li>
						<?php } ?>
					</li>

					<li>
						<a href="/cyc/wishlist" role="button" style="font-weight:600">
							<div class="wish-icon"></div>WISH LIST
						</a>

					</li>
				</li>
			</div>





		</ul>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



			<ul class="nav navbar-nav">



				<li>
					<a href="/cyc/" style="font-weight:600">Home</a>
				</li>
				<li>
					<a href="/cyc/cyc-articulos" style="border-bottom:2px solid #ffba56;">CONECTA Y COMPRA ARTÍCULOS</a>
				</li>
				<li>
					<a href="/cyc/cyc-servicios" style="border-bottom:2px solid #169e58;">CONECTA Y COMPRA SERVICIOS</a>
				</li>
				<li>
					<!-- <a href="/cyc/cyc-aprende" style="border-bottom:2px solid #547dbf;">CONECTA, COMPRA Y APRENDE </a> -->
					<a href="/cyc/login?p=cuenta" style="border-bottom:2px solid #547dbf;">CONECTA, COMPRA Y APRENDE </a>
				</li>



				<?php

				if ($_SESSION['user']) {
					$linkaccount = "/cyc/cuenta";
				} else {
					$linkaccount = "/cyc/login";
				}

				?>

				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style="font-weight:600">
						<?php if ($_SESSION['user']) { ?>
							<div class="cuenta-icon"></div>TU CUENTA<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" style="background:#fff; color: #222;">
							<li><a href="/cyc/cuenta">&nbsp;VER PERFIL</a></li>


							<?php

							if ($userRow2["suscripcion"] == 1) { ?>
								<li><a href="/cyc/crea-tienda">&nbsp;CREA TU TIENDA</a></li>
								<li><a href="/cyc/tiendas">&nbsp;MIS TIENDAS</a></li>
								<li><a href="/cyc/mis-productos">&nbsp;MIS PRODUCTOS</a></li>
							<?php } else if ($userRow2["suscripcion"] == 2) {
							}
							?>



							<li><a href="/cyc/pedidos">&nbsp;MIS PEDIDOS</a></li>
							<li style="float:left; width: 100%;"><a href="configuracion">CONFIGURACIÓN</a></li>
						</ul>
					<?php } else { ?>
						<a href="/cyc/login?p=cuenta" style="font-weight: bold;">&nbsp;Inicia Sesión</a>
					</li>
				<?php } ?>
			</li>

			<li>
				<a href='/cyc/wishlist' role='button' style="font-weight:600">
					<div class="wish-icon"></div>WISH LIST
				</a>

			</li>

			<li>
				<a data-balloon="Ver mi pedido" data-balloon-pos="down" id="vercart" data-toggle="modal" data-target="#inlinecart" role='button' style="font-weight:600" onclick="verCart();">
					<div class="cart-icon"></div>
					<div class="circlenumber" id="circlenumber" data-notify="0"><?php echo $cantCarrito; ?></div>
				</a>

			</li>


			<li class="mobilemenu2">
				<ul class="miniul2">
					<li>
						<a href="/cyc/registro" googl="true">Regístrate</a>
					</li>
					<li>
						<a href="/cyc/invitados">Invitados</a>
					</li>
					<li>
						<a href="/cyc/login">Miembros</a>
					</li>
					<li class="midw">
						<a href="/cyc/login_equipo">Equipo</a>
					</li>
					<li class="midw">
						<a href="/cyc/tarifas">Envíos</a>
					</li>
				</ul>

			</li>




		</ul>

	</div>

	<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<div class="modal modal2 fade in" id="inlinecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modalc3">
			<div class="modal-header">

				<h5 class="modal-title" id="exampleModalLongTitle">MI CARRITO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>


			<div class="modal-body text-center" id="inlinecartbody">
				<div class="container" style="width:100%;">



					<div class="col-md-12 text-center">







						<div class="table-container">



							<table width="100%">

								<thead>

									<tr style="color: #005B9C; font-size: 14px; text-transform: uppercase;">

										<td align="center" class="tdimg"><b></b></td>
										<td align="center"><b>Nombre</b></td>
										<td align="center"><b>Precio</b></td>
										<td align="center"><b>Cantidad</b></td>
										<!-- <td align="center"><b>Total</b></td> -->
										<td align="center"></td>
									</tr>

								</thead>

								<tbody id="algoaqui">

								</tbody>

							</table>



							<!-- <h3 class="<?php echo $shownocart; ?> totalcart"><span class="brown1">TOTAL: </span> $<span class="subtotalnumber"><?php echo bcdiv($total, '1', 2); ?></span></h3> -->


						</div>
					</div>

				</div>
			</div>



			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<?php
				if (strlen($uid2) > 0) {
					echo ' <a href="/cyc/checkout"><button type="button" class="btn btn-primary" id="terminarbtn1">Terminar compra</button></a>';
				} else {
					echo ' <a href="/cyc/login?p=checkout"><button type="button" class="btn btn-primary" id="terminarbtn1">Iniciar sesión y Terminar compra</button></a>';
				}
				?>

			</div>
		</div>
	</div>
</div>