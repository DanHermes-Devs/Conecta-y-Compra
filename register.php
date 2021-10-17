<?php

	ob_start();

	session_start();

	if( isset($_SESSION['user'])!="" ){

		header("Location: home.php");

	}

	include_once 'dbconnect.php';



	$error = false;



	if ( isset($_POST['btn-signup']) ) {

		

		//Datos del usuarios

		

		$ip = getenv('HTTP_CLIENT_IP')?:

		getenv('HTTP_X_FORWARDED_FOR')?:

		getenv('HTTP_X_FORWARDED')?:

		getenv('HTTP_FORWARDED_FOR')?:

		getenv('HTTP_FORWARDED')?:

		getenv('REMOTE_ADDR');



		$agent = mysqli_real_escape_string($_SERVER['HTTP_USER_AGENT']);



		$finish_time = time();		



		$texto_finish= date("d/m/y h:i:s a", $finish_time);

		

		// clean user inputs to prevent sql injections

		$name = trim($_POST['name']);

		$name = strip_tags($name);

		$name = htmlspecialchars($name);

		

		$email = trim($_POST['email']);

		$email = strip_tags($email);

		$email = htmlspecialchars($email);



		$tel = trim($_POST['tel']);

		$tel = strip_tags($tel);

		$tel = htmlspecialchars($tel);

		

		$pass = trim($_POST['pass']);

		$pass = strip_tags($pass);

		$pass = htmlspecialchars($pass);

		

		// basic name validation

		if (empty($name)) {

			$error = true;

			$nameError = "Ingresa tu nombre.";

		} else if (strlen($name) < 3) {

			$error = true;

			$nameError = "El nombre debe tener al menos 3 caracteres.";

		} else if (!preg_match("/^[a-zA-Z-zÑñáéíóúÁÉÍÓÚ ]+$/",$name)) {

			$error = true;

			$nameError = "Por favor ingresa sólo letras y espacios.";

		}

		

		// basic tel validation

		if (empty($tel)) {

			$error = true;

			$telError = "Ingresa tu teléfono.";

		} else if (strlen($tel) < 8) {

			$error = true;

			$telError = "El teléfono debe tener al menos 8 caracteres.";

		} else if (!preg_match("/^[0-9]+$/",$tel)) {

			$error = true;

			$telError = "Por favor ingresa sólo números y espacios.";

		}

		

		//basic email validation

		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

			$error = true;

			$emailError = "Ingresa una dirección de email válida.";

		} else {

			// check email exist or not

			$query = "SELECT email FROM usuarios WHERE email='$email'";

			$result = mysqli_query($conn, $query);

			$count = mysqli_num_rows($result);

			if($count!=0){

				$error = true;

				$emailError = "La dirección de correo ya fue registrada. Si no recuerdas tu contraseña, recuperala <a href='recupera.php'>aquí</a>";

			}

		}

		// password validation

		if (empty($pass)){

			$error = true;

			$passError = "Por favor ingresa una contraseña.";

		} else if(strlen($pass) < 6) {

			$error = true;

			$passError = "La contraseña debe contener al menos 6 caracteres.";

		}

		

		// password encrypt using SHA256();

		$password = hash('sha256', $pass);

		

		// if there's no error, continue to signup

		if( !$error ) {

			

			$query = "INSERT INTO usuarios(nombre,email, telefono, password, fecha, ip, browser, activo) VALUES('$name','$email', '$tel','$password', '$texto_finish', '$ip', '$agent', 1)";

			$res = mysqli_query($conn, $query);

				

			if ($res) {

				$errTyp = "success";

				$errMSG = "Tu registro se realizó con éxito. Puedes iniciar sesión <a href='index.php'>aquí</a>";

				unset($name);

				unset($email);

				unset($tel);

				unset($pass);

			} else {

				$errTyp = "danger";

				$errMSG = "Ocurrió un error, por favor intenta nuevamente más tarde...";	

			}	

				

		}

		

		

	}

?>

<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Registro</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />

<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>



<div class="container">



	<div id="login-form">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    

    	<div class="col-md-12">

        

        	<div class="form-group">

            	<h2 class="">Crea tu cuenta.</h2>

            </div>

        

        	<div class="form-group">

            	<hr />

            </div>

            

            <?php

			if ( isset($errMSG) ) {

				

				?>

				<div class="form-group">

            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">

				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>

                </div>

            	</div>

                <?php

			}

			?>

            

            <div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

            	<input type="text" name="name" class="form-control" placeholder="Nombre" maxlength="50" value="<?php echo $name ?>" />

                </div>

                <span class="text-danger"><?php echo $nameError; ?></span>

            </div>

            

            <div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>

            	<input type="email" name="email" class="form-control" placeholder="Email" maxlength="50" value="<?php echo $email ?>" />

                </div>

                <span class="text-danger"><?php echo $emailError; ?></span>

            </div>

			

			<div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>

            	<input type="text" name="tel" class="form-control" placeholder="Teléfono" maxlength="40" value="<?php echo $tel ?>" />

                </div>

                <span class="text-danger"><?php echo $telError; ?></span>

            </div>

            

            <div class="form-group">

            	<div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>

            	<input type="password" name="pass" class="form-control" placeholder="Contraseña" maxlength="15" />

                </div>

                <span class="text-danger"><?php echo $passError; ?></span>

            </div>

            

            <div class="form-group">

            	<hr />

            </div>

            

            <div class="form-group">

            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Regístrate</button>

            </div>

            

            <div class="form-group">

            	<hr />

            </div>

            

            <div class="form-group">

            	<a href="index.php">¿Ya tienes una cuenta? Inicia sesión aquí.</a>

            </div>

        

        </div>

   

    </form>

    </div>	



</div>



</body>

</html>

<?php ob_end_flush(); ?>