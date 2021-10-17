<?php

	ob_start();

	session_start();

	if( !isset($_SESSION['user'])){



	header("Location: login.php");

	

	}

	$uid=$_SESSION['user'];

	include_once 'dbconnect.php';



	require_once 'include/header.php';

	

	$queryimg = "SELECT * FROM tiendas WHERE id_usuario = $uid ORDER BY id_tienda DESC LIMIT 1";

	$resultimg = mysqli_query($conn, $queryimg) or die("Falló la consulta $queryimg");
	$numero_filas = mysqli_num_rows($resultimg);

	if($numero_filas == 0){

		//header('Location: /cyc');

	}

				
	$rowimg = mysqli_fetch_assoc($resultimg);					

	$id_tienda 	= $rowimg['id_tienda'];					

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

    padding: 10px;

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



.addproduct {

	position: fixed;

	width: 40px;

	height: 40px;

	z-index:99;

}



.addproduct img{width:100%; transition:.35s all ease;}

.addproduct:hover >img{padding:4%; transition:.35s all ease;}

.addproduct {

	right: 5%;

}

@media (max-width:800px){

.bagimg{width:50%; float:left;}

	.h1cuenta {	

	margin-top: 0;

}



.addproduct {

	position: relative;

	width: 40px;

	height: 40px;

	z-index: 99;

	right: 0;

	top: 0;

	/* max-width: 30px; */

	display: inline-block;

}

.addproduct img {

	width: 100%;

	transition: .35s all ease;

	min-width: 10px;

	max-width: 100%;

}

.container.pagecont {

	margin-top: 70px !important;

}



.col-sm-12.col-md-12.containerprods {

	text-align: center;

}

}



.contoverlay {

	position: relative;

}

.addcart {

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

}



.addwish {

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

}



</style>





	

	

	

	

			  

			  <div class="container pagecont" style="width: 100%;

           padding: 0px 15px;

margin-top: 150px;">



	   



		

		<h1 class="h1-tienda">MIS PRODUCTOS</h1>

		<a data-balloon="Agregar producto" data-balloon-pos="up" class="addproduct" href="agregar-producto"><img src="/cyc/img/add.png"></a>

		  

		<div class="row prodsection">

		

		<div class="row prodsection">



		<div class="col-sm-12 col-md-12 containerprods">



		   <?php

		//include('dbconnect.php');

		

		  $query = "SELECT * FROM productos WHERE id_tienda = $id_tienda";

          $result = mysqli_query($conn, $query) or die("Falló la consulta $queryimg");

          while($row = mysqli_fetch_assoc($result)){

			

            echo '

           

			

		   <div class="col-sm-3 col-md-3 prodcont" id="prod'.$row['id_producto'].'" >

		   <div class="contoverlay">

		    <a href="/cyc/producto/'.$row['url'].'"><img class="imgprod" src="/cyc/'.$row['img1'].'"> </a>

		  

		   </div>

		    <a href="/cyc/producto/'.$row['url'].'">

		   <p class="prod-desc">'.$row['nombre'].'</h3>

		   <h4 class="precio">$'.number_format($row['precio1'], 2).' MXN</h4>

		    </a>

		   <div class="overlay">

			   

		   </div>

		   </div>

		   

		  

		   

		   

            ';

          }



		?>



		  







		</div>







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