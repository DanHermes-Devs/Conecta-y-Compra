<?php

ob_start();

session_start();

if (!isset($_SESSION['cartuser'])) {
	//header("Location: login.php");
}

include_once 'dbconnect.php';
?>

<style>
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



	.containerprods {

		padding: 0 10%;

	}



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

<div class="container" style="width:100%;">



	<div class="col-md-12 text-center">







		<div class="table-container">



			<table width="100%">

				<thead>

					<tr style="color: #005B9C; font-size: 14px; text-transform: uppercase;">

						<td align="center" class="tdimg"><b></b>

						</td>
						<td align="center"><b>Nombre</b>

						</td>
						<td align="center"><b>Precio</b>

						</td>
						<td align="center"><b>Cantidad</b>

						</td>
						<td align="center"><b>Total</b>

						</td>
						<td align="center">

						</td>
					</tr>

				</thead>

				<tbody>



					<?php
					$iduserc = $_SESSION['cartuser'];

					$numero_filasc = 0;

					if (strlen($iduserc) > 0) {
						$suma = 0;

						$queryc = "SELECT *, COUNT(id_producto) as numprods FROM cart WHERE id_usuario = '$iduserc' GROUP BY id_producto";

						($resultc = mysqli_query($conn, $queryc)) or
							die("Falló la consulta $queryc");

						$numero_filasc = mysqli_num_rows($resultc);

						while ($rowc = mysqli_fetch_assoc($resultc)) {
							$idprodc = $rowc['id_producto'];

							$cantidad = $rowc['numprods'];

							$query = "SELECT * FROM productos WHERE id_producto = $idprodc";

							($result = mysqli_query($conn, $query)) or
								die("Falló la consulta $query");

							while ($row = mysqli_fetch_assoc($result)) {
								if ($row['precio2'] > 0) {
									$precio = $row['precio2'];
								} else {
									$precio = $row['precio1'];
								}

								$total1 = $precio * $cantidad;

								echo '

							

							 <tr id="prod' .
									$row['id_producto'] .
									'">

								<td style="text-align: center; padding:0;"><img class="imgprod tdimg" src="/cyc/' .
									$row['img1'] .
									'"></td>

								<td style="padding: 0 5%;">' .
									$row['nombre'] .
									'</td>

								<td>$' .
									$precio .
									'</td>

								<td>' .
									$rowc['numprods'] .
									'</td>

								<td>$' .
									$total1 .
									'</td>





								<td align="center">

								<form class="btndelete" data-balloon="Eliminar del carrito" data-balloon-pos="up" name="formbtndel' .
									$row['id_producto'] .
									'" id="formbtndel' .
									$row['id_producto'] .
									'" onsubmit="return false" action="deletecart.php?id=' .
									$row['id_producto'] .
									'" enctype="multipart/form-data" method="post">

								 <input class="removecart" data-idp ="' .
									$row['id_producto'] .
									'" data-idu ="' .
									$_SESSION['cartuser'] .
									'" data-idt ="' .
									$row['id_tienda'] .
									'"  type="image" id="btndel' .
									$row['id_producto'] .
									'" src="/cyc/img/delete.png" width="20px" border="0" alt="Eliminar" style="width:20px; margin: 0 10px; cursor: pointer; background: none; display: inline-block; padding: 0;">

								</form></td>

							</tr>

						

							';

								$suma += $cantidad * $precio;
							}
						}

						if ($numero_filasc < 1) {
							$shownocart = 'hidden';

							$shownocartstyle =
								'thead{display:none;} #terminarbtn1{display:none;}.cart-collaterals {display: none;}';

							echo '<a href="/cyc/"><h2 class="nowish"><span class="iconwish glyphicon glyphicon-shopping-cart"></span> <br>No hay productos en tu Carrito. <br><span>Comienza a agregar algunos visitando las tiendas.</span></h2></a>';
						}
					}
					?>



				</tbody>

			</table>



			<h3 class="<?php echo $shownocart; ?> totalcart"><span class="brown1">TOTAL: </span> $<span class="subtotalnumber"><?php echo $suma; ?></span></h3>





		</div>
	</div>

</div>



<style>
	<?php echo $shownocartstyle; ?>
</style>