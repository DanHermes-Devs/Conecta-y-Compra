<?php

if (isset( $_GET["id"] ) ) {
	if ( filter_var( $_GET["id"], FILTER_VALIDATE_INT ) ) {
		$producto_id = $_GET["id"];
	} else {
		header('Location: 404');
		exit;
	}
} else if (isset( $_GET["idsubcategoria"] ) ) {
	if ( filter_var( $_GET["idsubcategoria"], FILTER_VALIDATE_INT ) ) {
		$producto_idSub = $_GET["idsubcategoria"];
	} else {
		header('Location: 404');
		exit;
	}
}

include_once 'dbconnect.php';

require_once 'include/header.php';



$res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
$row = mysqli_fetch_assoc($userRow);

$sqlMostrarCatProd = "SELECT * FROM productos WHERE id_categoria = $producto_id";
$rsMostrarProd = mysqli_query ($conn, $sqlMostrarCatProd);


$sqlMostrarSubCatProd = "SELECT * FROM productos WHERE id_subcat = $producto_idSub";
$rsMostrarSubProd = mysqli_query ($conn, $sqlMostrarSubCatProd);	

	

	?>

	<div class="container pagecont" style="width: 100%;
	padding: 50px 15px; margin-top:100px;">


		<div class="container">
			<div class="row">

				<style>
					.texto-centrado {
						text-align: center;
					}

					.wi-100 {
						width: 100%;
					}

				</style>

				<?php while ($rowCat = mysqli_fetch_assoc($rsMostrarProd)) { ?>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="<?php echo $rowCat["img1"]; ?>" alt="...">
						<div class="caption">
							<h4 class="texto-centrado"><?php echo $rowCat["nombre"]; ?></h4>
							<p class="texto-centrado"><?php echo $rowCat["resumen"]; ?></p>
							<p class="texto-centrado">Precio: <?php echo $rowCat["precio1"]; ?></p>
							<p>
								<a href="producto/<?php echo $rowCat["url"] ?>" class="btn btn-primary wi-100" role="button">Ver Producto</a>
							</p>
						</div>
					</div>
				</div>
				<?php } ?>

				<?php while ($rowSubCat = mysqli_fetch_assoc($rsMostrarSubProd)) { ?>

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

<?php require_once 'include/footer.php'; ?>