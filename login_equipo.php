<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}

	$error = false;

	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($email)){
			$error = true;
			$emailError = "Ingresa tu email.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Ingresa una dirección de email válida.";
		}

		if(empty($pass)){
			$error = true;
			$passError = "Ingresa tu contraseña.";
		}

		// if there's no error, continue to login
		if (!$error) {

			$password = hash('sha256', $pass); // password hashing using SHA256

			$res=mysqli_query($conn, "SELECT id_usuario, nombre, password FROM usuarios WHERE email='$email'");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && $row['password']==$password ) {
				$_SESSION['user'] = $row['id_usuario'];
				header("Location: cuenta.php");
			} else {
				$errMSG = "Usuario o contraseña incorrectos, Intenta nuevamente...";
			}

		}

	}

	require_once 'include/header.php';
?>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; padding-top:140px;">

		   <div class="container">

		   <div class="col-md-6">
		 <a data-fancybox="" data-ratio="1" href="https://www.youtube.com/watch?v=m-_DUdbiwpY&feature=youtu.be">
			<img class="imgcyc2" src="img/invitaciones.jpg" style="width:100%;   cursror:pointer;  padding: 0;">
		 </a>



		</div>

		<div class="col-md-6">

		<div id="login-form" style="text-align:center;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">




		<div class="col-md-12">

        	<div class="form-group">
            	<h2 class="h2form">Iniciar sesión</h2>
            </div>

        	<div class="form-group">
            	<hr />
            </div>

            <?php
			if ( isset($errMSG) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Entrar</button>
            </div>
			<div class="form-group">
            	<a href="recupera.php">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<a href="registro.php">¿No tienes una cuenta? Regístrate aquí</a>
            </div>

        </div>

    </form>
    </div>



		</div>



</div>


	</div>

<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>
