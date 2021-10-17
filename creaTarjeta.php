<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		header("Location: login?p=cuenta");
	}
	else{
	$uid= $_SESSION['user'];
	}
	include_once 'dbconnect.php';

	if($_POST){
		$noTarjeta = trim($_POST["noTarjeta"]);
		$digitos = substr($noTarjeta, -4);
		$titular = trim($_POST["titular"];)
		$mes = trim($_POST["mes"]);
		$year = trim($_POST["year"]);
		$ccv = trim($_POST["ccv"]);
		$cp = trim($_POST["cp"]);
	}

	if($conn->connect_errno){
		die('Lo siento hubo un error con el servidor');
	} else {
		$sql1 = "INSERT INTO tarjetas(id_tarjeta, id_usuario, no_tarjeta, mes_vigencia, year_vigencia, ccv, titular, cp, digitos) VALUES(NULL, '$uid', '$noTarjeta', '$mes', '$year', '$ccv','$ccv', '$titular', '$cp', '$digitos')";
		$conn->query($sql1);
	}

	
		
		//$query = "INSERT INTO tarjetas(id_tarjeta, id_usuario, no_tarjeta, mes_vigencia, year_vigencia, ccv, titular, cp, digitos) 
		//VALUES(NULL, '$uid', '$noTarjeta', '$mes', '$year', '$ccv','$ccv', '$titular', '$cp', '$digitos')";

require_once 'include/header.php';

?>


<style>
	
	.d-flex{
		display: flex;
	}

	.justify-content-center{
		justify-content: center;
	}


</style>

<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">
	<h1 class="h1cuenta">AÑADE UNA NUEVA TARJETA</h1>
	<div class="row d-flex justify-content-center">
		<div class="col-md-4 col-sm-4">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="noTarjeta" placeholder="Número de Tarjeta" aria-describedby="Número de Tarjeta">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-user" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="titular" placeholder="Titular de la Tarjeta" aria-describedby="Titular de la Tarjeta">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-calendar" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="mes" placeholder="Mes de Vencimiento" aria-describedby="Mes de Vencimiento">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-calendar" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="year" placeholder="Año de Vencimiento" aria-describedby="Año de Vencimiento">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="ccv" placeholder="CCV" aria-describedby="CCV">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="cp" placeholder="Código Postal" aria-describedby="Código Postal">
				</div>

				<br/>

				<input type="submit" class="btn btn-block btn-primary" value="REGISTRAR TARJETA" name="btn-registrarTarjeta">
			</form>
		</div>
	</div>
</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>