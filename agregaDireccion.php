<?php
	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
		header("Location: login?p=cuenta");
	}
	else{

		$uid= $_SESSION['user'];
	}

	include_once 'dbconnect.php';

	$errores = "";
	$successMSG = "";

	if(isset($_POST["submit"])){

		$calle = trim($_POST["calle"]);
		$numero_interior = trim($_POST["numero_interior"]);
		$numero_exterior = trim($_POST["numero_exterior"]);
		$colonia = trim($_POST["colonia"]);
		$cp = trim($_POST["cp"]);
		$municipio = trim($_POST["municipio"]);
		$estado = trim($_POST["estado"]);
		$referencias = trim($_POST["referencias"]);
		$alias = trim($_POST["alias"]);

		$activo = "1";

		if(!empty($calle)){
			$calle = filter_var($calle, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa una calle.<br/>";
		}

		if(!empty($numero_interior)){
			$numero_interior = filter_var($numero_interior, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un número interior. Si no tiene número interior, poner s/n.<br/>";
		}

		if(!empty($numero_exterior)){
			$numero_exterior = filter_var($numero_exterior, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un número exterior. Si no tiene número exterior, poner s/n.<br/>";
		}

		if(!empty($colonia)){
			$colonia = filter_var($colonia, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa una colonia.<br/>";
		}

		if(!empty($cp)){
			$cp = filter_var($cp, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un código postal.<br/>";
		}

		if(!empty($municipio)){
			$municipio = filter_var($municipio, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un municipio.<br/>";
		}

		if(!empty($estado)){
			$estado = filter_var($estado, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un estado.<br/>";
		}

		if(!empty($referencias)){
			$referencias = filter_var($referencias, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa una referencia.<br/>";
		}

		if(!empty($alias)){
			$alias = filter_var($alias, FILTER_SANITIZE_STRING);
		} else {
			$errores .= "Por favor ingresa un alias.<br/>";
		}


		if(!empty($calle)){

			if($conn->connect_errno){
				die('Lo siento hubo un error con el servidor');
			} else {
				$sql1 = "INSERT INTO direcciones(id_direccion, id_usuario, calle, numero_interior, numero_exterior, colonia, cp, municipio, estado, referencias, alias, activo) 
				VALUES (NULL, '$uid', '$calle', '$numero_interior', '$numero_exterior', '$colonia', '$cp', '$municipio', '$estado', '$referencias', '$alias', $activo)";
				$conn->query($sql1);

				if($conn->affected_rows >= 1){
					$successMSG .= "La dirección ha sido agregada correctamente";
				}

			}

		}
		

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

	select.select {
	    width: 100%;
	    padding: 6px 12px;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	}



</style>

<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">
	<h1 class="h1cuenta">AGREGA UNA NUEVA DIRECCIÓN</h1>
	<div class="row d-flex justify-content-center">
		<div class="col-md-4 col-sm-4">

			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

				<?php if(!empty($successMSG)): ?>
					<div class="alert alert-success" role="alert"> 
						<span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?> Puedes ver tus direcciones <a href="cuenta">aqui</a>
					</div>
				<?php endif; ?>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-home" aria-hidden="true"></span>
				  <input type="text" class="form-control"  name="calle" placeholder="Ingresa Nombre de Calle" aria-describedby="Ingresa Nombre de Calle">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="numero_interior" placeholder="Ingresa un Número Interior" aria-describedby="Ingresa un Número Interior">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="numero_exterior" placeholder="Ingresa un Número Exterior" aria-describedby="Ingresa un Número Exterior">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-road" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="colonia" placeholder="Ingresa una Colonia" aria-describedby="Ingresa una Colonia">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon glyphicon-flag" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="cp" placeholder="Código Postal" aria-describedby="Código Postal">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-modal-window" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="municipio" placeholder="Ingresa un Municipio" aria-describedby="Ingresa un Municipio">
				</div>

				<br/>

				<!-- <div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-calendar" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="estado" placeholder="Ingresa un Estado" aria-describedby="Ingresa un Estado">
				</div> -->

				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-search" aria-hidden="true"></span>
					<select type="text" class="form-control" name="estado" aria-describedby="Ingresa un Estado" class="select">
				      <option value="no">Selecciona un Estado...</option>
				      <option value="Aguascalientes">Aguascalientes</option>
				      <option value="Baja California">Baja California</option>
				      <option value="Baja California Sur">Baja California Sur</option>
				      <option value="Campeche">Campeche</option>
				      <option value="Chiapas">Chiapas</option>
				      <option value="Chihuahua">Chihuahua</option>
				      <option value="CDMX">Ciudad de México</option>
				      <option value="Coahuila">Coahuila</option>
				      <option value="Colima">Colima</option>
				      <option value="Durango">Durango</option>
				      <option value="Estado de México">Estado de México</option>
				      <option value="Guanajuato">Guanajuato</option>
				      <option value="Guerrero">Guerrero</option>
				      <option value="Hidalgo">Hidalgo</option>
				      <option value="Jalisco">Jalisco</option>
				      <option value="Michoacán">Michoacán</option>
				      <option value="Morelos">Morelos</option>
				      <option value="Nayarit">Nayarit</option>
				      <option value="Nuevo León">Nuevo León</option>
				      <option value="Oaxaca">Oaxaca</option>
				      <option value="Puebla">Puebla</option>
				      <option value="Querétaro">Querétaro</option>
				      <option value="Quintana Roo">Quintana Roo</option>
				      <option value="San Luis Potosí">San Luis Potosí</option>
				      <option value="Sinaloa">Sinaloa</option>
				      <option value="Sonora">Sonora</option>
				      <option value="Tabasco">Tabasco</option>
				      <option value="Tamaulipas">Tamaulipas</option>
				      <option value="Tlaxcala">Tlaxcala</option>
				      <option value="Veracruz">Veracruz</option>
				      <option value="Yucatán">Yucatán</option>
				      <option value="Zacatecas">Zacatecas</option>
				  </select>
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-pencil" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="referencias" placeholder="Ingresa Referencias" aria-describedby="Ingresa Referencias">
				</div>

				<br/>

				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-user" aria-hidden="true"></span>
				  <input type="text" class="form-control" name="alias" placeholder="Ingresa un Alias" aria-describedby="Ingresa un Alias">
				</div>

				<br/>

				<?php if(!empty($errores)): ?>
					<div class="alert alert-danger" role="alert"> <?php echo $errores; ?> </div>
				<?php endif; ?>

				<input type="submit" class="btn btn-block btn-primary" value="REGISTRAR DIRECCIÓN" name="submit">
			</form>
		</div>
	</div>
</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>