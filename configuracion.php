<?php
ob_start();
session_start();
if( !isset($_SESSION['user'])){
	header("Location: login.php");
}
$uid=$_SESSION['user'];
include_once 'dbconnect.php';

require_once 'include/header.php';

$sql = "SELECT * FROM usuarios  WHERE activo = 1 AND id_usuario='".$uid."'";  
$rs_result = mysqli_query ($conn, $sql);  
$row = mysqli_fetch_assoc($rs_result);

$res2 = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario = ".$uid2."");
$userRow2 = mysqli_fetch_array($res2);
?>

<style>
	.h1cuenta {
		margin-top: 0;
	}

	.imgCard {
		width: 100px;
	}
</style>

<!-- Page Content -->
<div class="container pagecont" style="width: 100%;
padding: 50px 15px; margin-top:100px;">

<div class="container">

	<h1 class="h1cuenta">CONFIGURACIÓN DE LA CUENTA</h1>

	<form name="dataForm" id="dataForm" method="post" action="myData/validateData" class="ch-form myForm" novalidate="novalidate">
		<div class="col-sm-12 col-md-12">

			<div class="col-sm-6 col-md-6">
				<h2 class="typo">Mis datos</h2>





				<fieldset>
					<div>
						<h3 class="title title-line">Datos de cuenta

							

						</h3>
					</div>

					<div class="ch-form-row">
						<label>Usuario (email)</label>
						<span><?php echo $row['email'];?></span>
						
						<a class="smalla" href="#">Modificar</a>
						
					</div>


					<div class="ch-form-row">
						<label>Clave</label>
						<span>**********</span>
						<a class="smalla" href="#">Modificar</a>
					</div>
				</fieldset>


				<fieldset>
					<div>
						<h3 class="title title-line">Datos personales

							<div class="row-vert">
								<br>
							</div>

						</h3>
					</div>
					
					<div class="ch-form-row">
						<label>Nombre y apellido</label>

						<span><?php echo $row['nombre'];?></span>

						<a id="modif_name" class="smalla" href="#" aria-label="ch-modal-3">Modificar</a>


					</div>



					<div class="ch-form-row">
						<label>Teléfono:</label>
						<span id="span_phone">

							<?php echo $row['telefono'];?>


						</span>
						<span id="span_alternative_phone">

						</span>

						<a id="modif_phone" class="smalla" href="#" aria-label="ch-modal-4">Modificar</a>
						<span id="span_add_phone" class="add-phone">
							<a id="add_phone" class="smalla" href="#" aria-label="ch-modal-5">Agregar</a>
						</span>

					</div>

					
					

				</fieldset>



			</div>




			


			


			<div class="col-sm-6 col-md-6">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h3 class="title titleCards">Agrega Nueva Tarjeta</h3>
						<a href="agregaTarjeta" class="btn btn-success">Añadir nueva Tarjeta</a>
					</div>

					<div class="col-sm-12 col-md-12">
						<h3 class="title titleCards">Agrega Nueva Dirección</h3>
						<a href="agregaDireccion" class="btn btn-success">Añadir nueva Dirección</a>
					</div>

					<?php if ($userRow2["suscripcion"] == 1) { ?>	
						
					<?php } else if ($userRow2["suscripcion"] == 0){ ?>
						<div class="col-sm-12 col-md-12">
							<h3 class="title titleCards">¿Quieres ser Vendedor?</h3>
							<a href="contrato-servicio-cyc" class="btn btn-success">SUSCRIBETE</a>
						</div>
					<?php }
					?>
				</div>
			</div>

			<style>
				input[type=checkbox]{
					height: 0;
					width: 0;
					visibility: hidden;
				}

				.togglecheck {
					cursor: pointer;
					text-indent: -9999px;
					width: 50px;
					height: 25px;
					background: grey;
					display: block;
					border-radius: 50px;
					position: relative;
				}

				.togglecheck:after {
					content: '';
					position: absolute;
					top: 0px;
					left: 0px;
					width: 25px;
					height: 25px;
					background: #fff;
					border-radius: 25px;
					transition: 0.3s;
					-webkit-box-shadow: -1px 11px 24px -7px rgba(0,0,0,0.95);
					-moz-box-shadow: -1px 11px 24px -7px rgba(0,0,0,0.95);
					box-shadow: 11px 24px -7px rgba(0,0,0,0.95);
				}

				input:checked + .togglecheck {
					background: #bada55;
				}

				input:checked + .togglecheck:after {
					left: calc(100% - 0px);
					transform: translateX(-100%);
				}

				.togglecheck:active:after {
					width: 50px;
				}


			</style>
			<div class="col-sm-6 col-md-6 ">

				<h3>Preferencias de notificaciones</h3>

				<div class="col-sm-2 col-md-2">
					<input type="checkbox" id="switch" checked /><label class="togglecheck" for="switch">Toggle</label>
				</div>

				<div class="col-sm-10 col-md-10" style="padding-top: 22px;">
					<p>Newsletter Conecta y Compra</p>
				</div>


				<div class="col-sm-2 col-md-2">
					<input type="checkbox" id="switch2" checked /><label class="togglecheck" for="switch2">Toggle</label>
				</div>

				<div class="col-sm-10 col-md-10" style="padding-top: 22px;">
					<p>Información de pedidos</p>
				</div>

			</div>


		</form>



	</div>


</div>

</div>

<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>