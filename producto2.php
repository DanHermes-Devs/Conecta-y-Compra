<?php
	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		
	}
	$uid=$_SESSION['user'];
	include_once 'dbconnect.php';

	require_once 'include/header.php';
?>
<style>
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

.cuenta-icon{width:30px; float: left; height:30px; background-image:url("img/user.png"); background-size:100%; background-repeat:no-repeat; margin-top:-8px;}

.wish-icon{width:30px; float: left; height:30px; background-image:url("img/wish.png"); background-size:100%; background-repeat:no-repeat; margin-top:-8px;}

.cart-icon{
width: 45px;
float: left;
height: 30px;
background-image: url("img/cart.png");
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

@media (max-width:700px){
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
    text-align: center;
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
</style>

    <!-- Page Content -->
    			<div class="container" style="margin-top:150px; margin-bottom:50px;">
			
			<div class="col-sm-6 col-md-6 desktop">
			
			    <ul id="vertical">
				  <li data-thumb="img/prod1.jpg">
				   <a data-fancybox="gallery" href="img/prod1.jpg">
					<img id="zoom1" class="zoomimg" src="img/prod1.jpg" data-zoom-image="img/prod1.jpg" />
					  </a>
				  </li>
				  <li data-thumb="img/prod2.jpg">
				  <a data-fancybox="gallery" href="img/prod2.jpg">
					<img id="zoom2" class="zoomimg" src="img/prod2.jpg" data-zoom-image="img/prod2.jpg" />
				  </a>
				  </li>
				  <li data-thumb="img/prod3.jpg">
				  <a data-fancybox="gallery" href="img/prod3.jpg">
					<img id="zoom3"  class="zoomimg" src="img/prod3.jpg" data-zoom-image="img/prod3.jpg"  />
				 </a>
				  </li>
				</ul>
					  
		   
		   </div>
		   
		   <div class="col-sm-6 col-md-6 tablet">
			
			    <ul id="verticalm">
				  <li data-thumb="img/prod1.jpg">
				   <a data-fancybox="gallery2" href="img/prod1.jpg">
					<img src="img/prod1.jpg" />
					  </a>
				  </li>
				  <li data-thumb="img/prod2.jpg">
				  <a data-fancybox="gallery2" href="img/prod2.jpg">
					<img src="img/prod2.jpg" />
				  </a>
				  </li>
				  <li data-thumb="img/prod3.jpg">
				  <a data-fancybox="gallery2" href="img/prod3.jpg">
					<img src="img/prod3.jpg" />
				 </a>
				  </li>
				</ul>
					  
		   
		   </div>
		   
		   <div class="col-sm-6 col-md-6 ">
		   
		   <h1 class="titleprod">Nombre del producto</h1>
		  
		   <h4 class="titletab">Resumen del Producto</h4>
		    <p class="resumen">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
		   
		   
		   </p>
		   <h4 ><del>$6000.00 MXN</del></h4>
		   <h2 class="precio">$5000.00 MXN</h4>
		   
		   <a class="buybutton" href="#" style="display: inline-block;">Comprar ahora</a>
		   <a class="wishtbutton" href="#" style="display: inline-block;">A??adir a Wish list</a>
		   
		   </div>
		   
		   </div>
		   
		   
		   <div class="container" style="margin-bottom:60px;">
	<div class="row">
	
		                                <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalles del producto</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Valoraciones</a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Env??o y pago</a></li>
                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Reportar producto</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
										<h4 class="titletab">Detalles del Producto</h4>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                        <div role="tabpanel" class="tab-pane" id="profile">
										<h4 class="titletab">Valoraciones</h4>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                        <div role="tabpanel" class="tab-pane" id="messages">
										<h4 class="titletab">Env??o y pago</h4>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                        <div role="tabpanel" class="tab-pane" id="settings">
										<h4 class="titletab">Reportar Producto</h4>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                    </div>
</div>
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
  

 
	<link type="text/css" rel="stylesheet" href="css/lightslider.css" />                  
<script src="js/lightslider.js"></script>
<script src="js/jquery.elevatezoom.js"></script>
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

	  
</script>

	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>