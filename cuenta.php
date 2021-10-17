<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login?p=cuenta");
} else {
	$uid = $_SESSION['user'];
}
include_once 'dbconnect.php';

require_once 'include/header.php';

$tabla1 = "direcciones";
$tabla2 = "usuarios";


$sql = "SELECT * FROM usuarios WHERE activo = 1 AND id_usuario='" . $uid . "'";
$rs_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs_result);


$res2 = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario = " . $uid2 . "");
$userRow2 = mysqli_fetch_array($res2);

// echo "<pre>";
// print_r($userRow2);
// echo "</pre>";

?>


<style>
	.h1cuenta {
		color: #547dbf;
		font-size: 2em;
		font-weight: 600;
		padding: 10px 10px 5px 10px;
		margin: 25px 0;
		text-align: left;
		border-bottom: 2px solid #ccc;
		padding-bottom: .6em;
	}

	@media(max-width:800px) {
		.container.pagecont {
			margin-top: 50px !important;
		}

		.h1cuenta {
			font-size: 22px;
			text-align: center;
		}

		table {
			width: 100%;
			min-width: 100%;
		}

		.pagecont .container {
			padding-top: 0 !important;
			padding: 0 5%;
			margin: 0;
		}

		.container.pagecont {
			margin-top: 50px !important;
			margin-bottom: 40px;
		}

		.table-container {
			overflow-x: scroll;
		}

		.container.contcuenta {
			text-align: center;
		}

		.container.contcuenta h1 {
			text-align: center;
		}

	}


	.center-text {
		text-align: center;
	}
</style>

<!-- Page Content -->
<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">

	<div class="container contcuenta">

		<h1 class="h1cuenta" style="color: #db4537;">MI CUENTA</h1>
		<div class="col-sm-12 col-md-12 " style="padding:0;     margin-bottom: 15px;">

			<div class="col-sm-2 col-md-2 ">
				<img src="img/avatarcyc.png">
			</div>

			<div class="col-sm-5 col-md-5 ">

				<?php echo "

				<div class='direccionagregada2'>
				<h4> ¡Hola, " . $row['nombre'] . "!</h4>

				<p><b>Teléfono: </b> " . $row['telefono'] . "</p>
				<p><b>Email: </b> " . $row['email'] . "</p>
				<p><b>Fecha de registro: </b> " . $row['fecha'] . "</p>
				<br>

				</div>
				
				";
				?>

			</div>


		</div>
	</div>


	<?php

	if ($userRow2["suscripcion"] == 1) { ?>

		<div class="container contcuenta" id="direcciones">

			<h1 class="h1cuenta" style="color: #005B9C;">MIS DIRECCIONES</h1>

			<div class="table-container">

				<?php

				$sql2 = "SELECT direcciones.*, usuarios.* 
				FROM direcciones
				INNER JOIN usuarios ON (direcciones.id_usuario = usuarios.id_usuario) WHERE direcciones.id_usuario = '" . $uid . "'";
				$rs_result2 = mysqli_query($conn, $sql2);
				// $row2 = mysqli_fetch_assoc($rs_result2);

				?>
				<table width="100%" style="text-align:center;">
					<thead>
						<tr style="color: #005B9C;font-size: 14px;text-transform: uppercase;">
							<td align='center'><b>Alias</b></td>
							<td align='center'><b>Calle</b></td>
							<td align='center'><b>Número Interior</b></td>
							<td align='center'><b>Número Exterior</b></td>
							<td align='center'><b>Colonia</b></td>
							<td align='center'><b>Código Postal</b></td>
							<td align='center'><b>Municipio</b></td>
							<td align='center'><b>Referencias</b></td>
						</tr>
					</thead>

					<tbody>
						<?php
						while ($row2 = mysqli_fetch_assoc($rs_result2)) {
						?>
							<tr>
								<td><?php echo $row2["alias"]; ?></td>
								<td><?php echo $row2["calle"]; ?></td>
								<td><?php echo $row2["numero_interior"]; ?></td>
								<td><?php echo $row2["numero_exterior"]; ?></td>
								<td><?php echo $row2["colonia"]; ?></td>
								<td><?php echo $row2["cp"]; ?></td>
								<td><?php echo $row2["municipio"]; ?></td>
								<td><?php echo $row2["referencias"]; ?></td>


								<td align='center'>
									<a href="borrar-direccion.php?id=<?= $row2["id_direccion"]; ?>"> <img style="width: 20px;" src="img/delete.png"> </a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>


		<div class="container contcuenta" id="tarjetas">

			<h1 class="h1cuenta" style="color: #ffba56;">MIS TARJETAS</h1>
			<div class="col-sm-12 col-md-12 " style="padding:0; margin-bottom: 15px;">

				<?php
				$sql3 = "SELECT tarjetas.*, usuarios.* 
				FROM tarjetas
				INNER JOIN usuarios ON (tarjetas.id_usuario = usuarios.id_usuario) WHERE tarjetas.id_usuario = '" . $uid . "'";
				$rs_result3 = mysqli_query($conn, $sql3);

				?>


			</div>


			<div class="table-container">

				<?php

				$sql3 = "SELECT tarjetas.*, usuarios.* 
				FROM tarjetas
				INNER JOIN usuarios ON (tarjetas.id_usuario = usuarios.id_usuario) WHERE tarjetas.id_usuario = '" . $uid . "'";
				$rs_result3 = mysqli_query($conn, $sql3);
				// $row2 = mysqli_fetch_assoc($rs_result2);

				?>
				<table width="100%" style="text-align:center;">
					<thead>
						<tr style="color: #005B9C;font-size: 14px;text-transform: uppercase;">
							<td align='center'><b>Terminada en</b></td>
							<td align='center'><b>Fecha de Vigencia</b></td>
						</tr>
					</thead>

					<tbody>
						<?php
						while ($row3 = mysqli_fetch_assoc($rs_result3)) {
						?>
							<tr>
								<td><?php echo $row3["digitos"]; ?></td>
								<td><?php echo $row3["mes_vigencia"]; ?>/<?php echo $row3["year_vigencia"]; ?></td>


								<td align='center'>
									<a href="borrar-tarjeta.php?idTarjeta=<?= $row3["id_tarjeta"]; ?>"> <img style="width: 20px;" src="img/delete.png"> </a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>


		<div class="container">

			<h1 class="h1cuenta" style="color: #db4537">MIS TIENDAS</h1>

			<div class="datagrid" id="datagrid">

				<?php

				$sql = "SELECT * FROM tiendas  WHERE activo = 1 AND id_usuario='" . $uid . "'";
				$rs_result = mysqli_query($conn, $sql);
				?>
				<div class="table-container">
					<table width="100%" style="text-align:center;">
						<thead>
							<tr style="    color: #005B9C;
							font-size: 14px;
							text-transform: uppercase;">
								<td align='center' style="max-width: 50px;"></td>
								<td align='center'><b>Nombre de la tienda</b></td>
								<td align='center'><b>Descripción</b></td>
								<td align='center'><b>Etiquetas</b></td>
								<td align='center' style="max-width: 100px;"><b>Categoría</b></td>
								<td align='center'><b>Teléfono</b></td>

								<td align='center' style="max-width: 200px;"><b>Dirección</b></td>
								<td align='center'></td>
							</tr>
						</thead>

						<tbody>
							<?php
							while ($rown = mysqli_fetch_assoc($rs_result)) {
							?>
								<tr>

									<td style="max-width: 50px; padding:0;"> <a data-balloon='Ver tienda' data-balloon-pos='up' href="tienda/<?php echo $rown["url"]; ?>"><img src="img/shop.png" style="width:30px;"></a></td>
									<td><?php echo $rown["titulo"]; ?></td>
									<td><?php echo $rown["descripcion"]; ?></td>
									<td><?php echo $rown["etiquetas"]; ?></td>
									<td><?php echo $rown["categoria"]; ?></td>
									<td><?php echo $rown["telefono"]; ?></td>
									<td><?php echo $rown["direccion"]; ?></td>


									<td align='center'>
										<a href="borrar-tienda.php?idTienda=<?= $rown["id_tienda"]; ?>"> <img style="width: 20px;" src="img/delete.png"> </a>
									</td>
								</tr>
							<?php
							};
							?>
						</tbody>
					</table>
				</div>
			</div>

		<?php } else if ($userRow2["suscripcion"] == 0) {}?>

		</div>

		<div class="container pagecont" style="width: 100%; padding: 50px 15px;">

				<div class="container">

					<h1 class="h1cuenta">MIS PEDIDOS</h1>

					<div class="datagrid" id="datagrid">

						<?php
						// Escribir el o los querys
						$query_orden  = "SELECT p.`id_pedido`, p.`referencia_cobro`, p.`id_transaccion_paypal`, DATE_FORMAT(p.`fecha`, '%d/%m/%Y') as fecha, p.`monto`, p.`status`, p.`costo_envio` FROM `pedidos` p "; 

						// Consultar la BD
						$resultado_orden  = mysqli_query($conn, $query_orden); // Consulta para las usuarios
						?>
						<div class="table-container">
							<table width="100%" style="text-align:center;">
								<thead>
									<tr style="color: #005B9C;font-size: 14px;text-transform: uppercase;">
										<td class='center-text' style="max-width: 50px;"></td>
										<th class='center-text'>#</th>
										<th class='center-text'>Ref. / Transacción</th>
										<th class='center-text'>Fecha</th>
										<th class='center-text'>Monto</th>
										<th class='center-text'>Estado</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                while ($rows = mysqli_fetch_assoc($resultado_orden)) :
                                ?>
                                    <tr>
                                        <td style="max-width: 100px; padding:0;"> <img src="img/order.png" style="width:80px;"></td>
                                        <td class='center-text'><?php echo $rows['id_pedido']; ?></td>
                                        <td class='center-text'><?php echo $rows['referencia_cobro']; echo $rows['id_transaccion_paypal']?></td>
                                        <td class='center-text'><?php echo $rows['fecha']; ?></td>
                                        <td class='center-text'><?php echo $rows['monto']; ?></td>
                                        <td class='center-text'><?php echo $rows['status']; ?></td>
                                    </tr>
                                <?php endwhile; ?>	
								</tbody>
							</table>
						</div>

					</div>



				</div>


			</div>




</div>

<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>