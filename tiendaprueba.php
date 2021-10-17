<?php
	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
	
	}
	$uid=$_SESSION['user'];
	include_once 'dbconnect.php';

	require_once 'include/header.php';
?>

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

.h1-tienda{color:#f5b417; font-weight:600; text-align:center; padding:20px 0 0 0; margin:0; font-size:2em;}
.h3-tienda{color:#ffbb56;text-align:center; padding:0; margin:0; font-size:1.3em;}
.imgdest{
max-width: 100%;
padding: 7.5px 0;
}

.destcont {
    padding: 10px 0;
	
}
.prodsection{margin-bottom:50px;}
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
.precio{color:#da4536; font-weight:600; font-size:1.6em;padding: 0 10px;
margin: 2px 0;}

.carousel {
    position: relative;
    margin-top: 45px;
    width: 100%;
    float: left;
    margin-bottom: 15px;
}


@media (max-width:800px){
.bagimg{width:50%; float:left;}
.container.pagecont {
	margin-top: 0 !important;
}
.pagecont img {
	width: 100%;
	padding: 0 !important;
	margin-bottom: 15px;
}
}

@media (max-width:500px){
.bagimg{width:100%; float:left;}
}
</style>


	
	<div style="width:100%; background-color:#547dbf; float: left; padding:10px 30px; display:none;">
	<ul class="menu-tienda" style="text-align:center;">
                    <li>
                        <a href="#">TIENDA</a>
                    </li>
                    <li>
                        <a href="#">PRODUCTOS</a>
                    </li>
					<li>
                        <a href="#">OFERTAS</a>
                    </li>
					<li>
                        <a href="#">RECOMENDADOS</a>
                    </li>
                   
					
        </ul>
	</div>
	
	<div id="carousel-bounding-box">
                  <div class="carousel slide" id="tiendaBanner">
                      <!-- Carousel items -->
                      
					  <div class="carousel-inner">
                          <div class="active item" data-slide-number="0">
                          <img src="img/tienda/banner-tienda.jpg"></div>

                          <div class="item" data-slide-number="1">
                          <img src="img/tienda/banner-tienda.jpg"></div>

                        


                      </div>
					  
					  <!-- Carousel nav -->
                        <a class="left carousel-control" href="#tiendaBanner" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#tiendaBanner" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
			  
			  <div class="container pagecont" style="width: 100%;
           padding: 0px 15px;
margin-top: 100px;">
 <div class="logov2" style="padding:0; text-align: center;">
		   <img class="logo-tienda" src="img/tienda/logo-tienda.png" style="width:100%; max-width:350px; padding:10px;">
		   </div> 
	   
           <div class="col-sm-12 col-md-12" style="padding:20px; display:none;">
		   
		   <h3 class="h3-tienda">LOREM IPSUM DOLOR</h3>
		   <h1 class="h1-tienda">LOREM IPSUM DOLOR</h1>
		   
	
		</div>
		
		<div class="col-sm-12 col-md-12" style="padding:0;">
		   
		   <div class="col-sm-4 col-md-4 destcont" >
		   
		   <img class="imgdest" src="img/tienda/dest-1.jpg">
		   
		   </div>
		   
		   <div class="col-sm-4 col-md-4 destcont">
		    <div class="col-sm-12 col-md-12">
			<img class="imgdest" src="img/tienda/dest-2.jpg">
		   
		   </div>
		    <div class="col-sm-12 col-md-12" >
			<img class="imgdest" src="img/tienda/dest-3.jpg">
		   
		   </div>
		   
		   </div>

		   <div class="col-sm-4 col-md-4 destcont">
		   <img class="imgdest" src="img/tienda/dest-4.jpg">
		   
		   </div>
		   
	
		</div>
		
		<div class="row prodsection">
		
		<div class="col-sm-12 col-md-12 containerprods">
		   
		   <h3 class="h3-tienda hidden">NUEVOS</h3>
		   <h1 class="h1-tienda">PRODUCTOS</h1>
		   
		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" > 
		   <img class="imgprod" src="img/tienda/prod1.jpg">
		   <p class="prod-desc">Global Versión Xiaomi mi A1 MiA1 4 GB RAM 64 GB ROM </h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>


		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/prod2.jpg">
		   <p class="prod-desc">Original Xiaomi Redmi Nota 4X4 GB RAM 64 GB ROM Teléfono</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/prod3.jpg">
		   <p class="prod-desc">ROM Original Xiaomi Redmi mundial 4A 4 2 GB RAM 16 GB</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/prod4.jpg">
		   <p class="prod-desc">Original Xiaomi Redmi 4 Teléfono Móvil Snapdragon 430</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
	
		</div>
		
		<div class="col-sm-12 col-md-12 containerprods" >
		   
		   <h3 class="h3-tienda hidden">PRODUCTOS</h3>
		   <h1 class="h1-tienda hidden">REBAJADOS</h1>
		   
		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/rebajado1.jpg">
		   <p class="prod-desc">Global Versión Xiaomi mi A1 MiA1 4 GB RAM 64 GB ROM  </h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>


		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/rebajado2.jpg">
		   <p class="prod-desc">Original Xiaomi Redmi Nota 4X4 GB RAM 64 GB ROM Teléfono</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
		   <a href="producto.php">
		   <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/rebajado3.jpg">
		   <p class="prod-desc">ROM Original Xiaomi Redmi mundial 4A 4 2 GB RAM 16 GB</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
		   <a href="producto.php">		  
		  <div class="col-sm-3 col-md-3 prodcont" >
		   <img class="imgprod" src="img/tienda/rebajado4.jpg">
		   <p class="prod-desc">Original Xiaomi Redmi 4 Teléfono Móvil Snapdragon 430</h3>
		   <h4 class="precio">$0.00 MXN</h4>
		   </div>
		   </a>
		   
	
		</div>
		
		</div>
	</div>
	
	
    <!-- /.container -->

	
<script >
	
	if (screen.width < 700) {
    var $wHeight = 150;
}
else {

    var $wHeight = 300;
}
jQuery(document).ready(function($) {

    
    $('#tiendaBanner').carousel({
            interval: 3000
    });

    $('#carousel-text').html($('#slide-content-0').html());

});



function c2goToSlide(number) {
   $("#tiendaBanner").carousel(number);
}
</script>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>