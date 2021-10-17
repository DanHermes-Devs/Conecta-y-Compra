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
}

@media (max-width:500px){
.bagimg{width:100%; float:left;}
}
	
	.containerserv{
		
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
                          <img src="img/tienda/banner-servicios.jpg"></div>

                          <div class="item" data-slide-number="1">
                          <img src="img/tienda/banner-servicios.jpg"></div>

                        


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
		   <img class="logo-tienda" src="img/tienda/logo-servicios.png" style="width:100%; max-width:350px; padding:10px;">
		   </div> 
	   
           <div class="col-sm-12 col-md-12" style="padding:20px; display:none;">
		   
		   <h3 class="h3-tienda">LOREM IPSUM DOLOR</h3>
		   <h1 class="h1-tienda">LOREM IPSUM DOLOR</h1>
		   
	
		</div>
		
		<div class="col-sm-12 col-md-12" style="padding:0;">
		   
		   <div class="col-sm-4 col-md-4 destcont" >
		   
		   <img class="imgdest" src="img/serv/dent-1.png">
		   
		   </div>
		   
		   <div class="col-sm-4 col-md-4 destcont">
		    <div class="col-sm-12 col-md-12">
			<img class="imgdest" src="img/serv/dent-2.png">
		   
		   </div>
		    <div class="col-sm-12 col-md-12" >
			<img class="imgdest" src="img/serv/dent-3.png">
		   
		   </div>
		   
		   </div>

		   <div class="col-sm-4 col-md-4 destcont">
		   <img class="imgdest" src="img/serv/dent-4.png">
		   
		   </div>
		   
	
		</div>
		
		<div class="row prodsection">
		
		<div class="col-sm-6 containerprods">
			
			<h3>El Mejor Servicio Garantizado</h3>
			<p>Nuestros tratamientos están garantizados. Te explicamos todas las ventajas antes de iniciar tu tratamiento.<br>
<br>

			Odontólogos generales y especialistas altamente profesionales, egresados de las mejores universidades del país.<br>
<br>

			Contamos con equipo dental innovador y de la más alta calidad.</p>
			
			<h3>Datos</h3>
			<p>Email: contaco@dentista.com<br>
			   Teléfono: 0000 0000<br></p>

		</div>
			
		<div class="col-sm-6">
			
            <h3>Ubicación</h3>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15037.958906532866!2d-99.24852613458826!3d19.563509005839613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d21cfb038ea9f1%3A0xe5681a27debc2c20!2sDental+Premier!5e0!3m2!1ses!2smx!4v1534196728285" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				
		</div>	
	
		
		</div>
				  
		<div class="row containerprods">
			
			<div class="col-sm-12 col-md-12">
			
			<h3>Family Dental Care</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
<br>
Curabitur nisi neque, tincidunt a augue sit amet, fringilla tristique orci. Mauris vitae varius massa. Sed vestibulum velit erat, at sollicitudin arcu malesuada ultricies. Maecenas rhoncus feugiat faucibus. Ut suscipit, urna sit amet imperdiet consectetur, lorem risus egestas urna, quis condimentum odio neque et arcu. <br>
<br>
Phasellus nec imperdiet ex, vitae placerat libero. Suspendisse potenti.<br>
<br>
<br>
<br>
<br>
<br>
</p>
			
			
			
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