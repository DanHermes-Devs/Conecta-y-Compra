
<?php

ob_start();

session_start();

if( !isset($_SESSION['user'])){

	header("Location: login?p=wishlist");

}

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



		@media (max-width:800px){

			.bagimg{width:50%; float:left;}

			.container.pagecont {

				float: left;

				display: inline-block;

				min-height: 0 !important;

				margin-top: 40px !important;

			}



			.containerprods {

				padding: 0 10%;

				text-align: center;

			}



			.h1-tienda {

				font-size: 22px;

				margin-top: 0;

				padding-top: 10px;

				margin-bottom: 20px;

			}

		}



		@media (max-width:500px){

			.bagimg{width:100%; float:left;}

		}



		.addcart, .removecart {

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



		.addwish, .removewish {

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

			cursor:pointer;

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



	



	<div class="container pagecont" style="width: 100%; padding: 0px 15px; padding-top:100px">





		

		

		

		<div class="row prodsection">



			<div class="col-sm-12 col-md-12 containerprods">



				<h1 class="h1-tienda">MI WISHLIST</h1>





				<?php

				$iduserw = $_SESSION['user'];

				$numero_filasw = 0;

				if(strlen($iduserw)>0){

					$queryw = "SELECT * FROM wishlist WHERE id_usuario = $iduserw GROUP BY id_producto";

					$resultw = mysqli_query($conn, $queryw) or die("Falló la consulta $queryw");

					$numero_filasw = mysqli_num_rows($resultw);

					

					while($roww = mysqli_fetch_assoc($resultw)){

						$idprodw = $roww['id_producto'];

						

						$query = "SELECT * FROM productos WHERE id_producto = $idprodw";

						$result = mysqli_query($conn, $query) or die("Falló la consulta $query");

						while($row = mysqli_fetch_assoc($result)){

							$btnw = '<div class="removewish" data-idp ="'.$row['id_producto'].'" data-idu ="'.$_SESSION['user'].'" data-idt ="'.$row['id_tienda'].'"><span class="iconwish glyphicon glyphicon-heart"></span> <span class="textwish">Quitar de Wishlist</span></div>';

							

							$idprodc = $row['id_producto'];

							$iduserc = $_SESSION['cartuser'];

							$numero_filasc = 0;

							if(strlen($iduserc)>0){

								$queryc = "SELECT * FROM cart WHERE id_producto = $idprodc AND id_usuario = '$iduserc' LIMIT 1";

								$resultc = mysqli_query($conn, $queryc) or die("Falló la consulta $queryc");

								$numero_filasc = mysqli_num_rows($resultc);

								

							}

							

							if($numero_filasc == 1){

								$btnc = '<div class="removecart" data-idp ="'.$row['id_producto'].'" data-idu ="'.$_SESSION['cartuser'].'" data-idt ="'.$row['id_tienda'].'"><span class="iconcart glyphicon glyphicon glyphicon-remove"></span> <span class="textcart">Quitar del Carrito</span></div>';

							}

							else{

								$btnc = ' <div class="addcart" data-idp ="'.$row['id_producto'].'" data-idu ="'.$_SESSION['cartuser'].'" data-idt ="'.$row['id_tienda'].'"><span class="iconcart glyphicon  glyphicon-shopping-cart"></span> <span class="textcart">Añadir al Carrito</span></div>';

							}





							echo '



							<div class="col-sm-3 col-md-3 prodcont" id="prod'.$row['id_producto'].'" >

							<div class="contoverlay">

							<a href="/cyc/producto/'.$row['url'].'"><img class="imgprod" src="/cyc/'.$row['img1'].'"> </a>



							</div>

							<a href="/cyc/producto/'.$row['url'].'">

							<p class="prod-desc">'.$row['nombre'].'</h3>

							<h4 class="precio">$'.number_format($row['precio2'], 2).' MXN</h4>

							</a>

							<div class="overlay">

							'.$btnc.$btnw.'



							</div>

							</div>



							';

						}

					}

					

					if($numero_filasw <1){

						

						echo '<a href="/cyc/"><h2 class="nowish"><span class="iconwish glyphicon glyphicon-heart-empty"></span> <br>No hay productos en tu Wishlist. <br><span>Comienza a agregar algunos visitando las tiendas.</span></h2></a>';

					}

					

				}

				

				



				?>











			</div>

			<div class="col-sm-12 col-md-12 containerprods">
				<h3 class="h1-tienda text-uppercase">Productos Relacionados</h3>

				<div class="row" style="padding: 2rem 0 2rem 0; text-align: center;">

					<?php 

						$sqlMostrarCatProd = "SELECT categorias.*, productos.*
						FROM productos
						INNER JOIN categorias on (productos.id_producto=categorias.id)
						WHERE categorias.vista_cat = 1
						ORDER BY rand() LIMIT 4";
						$rsMostrarProd = mysqli_query ($conn, $sqlMostrarCatProd);
						while ($rowSubCat = mysqli_fetch_assoc($rsMostrarProd)) {

					?>
					<div class="col-md-3">
						<div class="thumbnail">
							<img src="<?php echo $rowSubCat["img1"]; ?>" alt="...">
							<div class="caption">
								<h4 class="texto-centrado"><?php echo $rowSubCat["nombre"]; ?></h4>
								<p class="texto-centrado"><?php echo $rowSubCat["resumen"]; ?></p>
								<p class="texto-centrado">Precio: <?php echo $rowSubCat["precio1"]; ?></p>
								
								<p>
									<a href="producto/<?php echo $rowSubCat["url"] ?>" class="btn btn-primary wi-100" role="button">Ver Producto</a>
								</p>
							</div>
						</div>
					</div>

				<?php } ?>

				</div>
			</div>







		</div>

	</div>

	

	

	<?php require_once 'include/footer.php'; ?>



</body>



</html>

<?php ob_end_flush(); ?>

