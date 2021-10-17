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

require_once 'include/header.php';

?>
<style>
	
	.d-flex{
		display: flex;
	}

	.justify-content-center {
		justify-content: center;
	}

	.align-items-center {
		align-items: center;
	}

	.flex-column {
		flex-direction: column;
	}

	p.label.label-danger {
		font-size: 1.5rem;
	}

	.formularioAct {
		width: 50%;
		text-align: center;
	}

	.mt-1{
		margin-top: 1rem;
		width: 50%;
	}

	.btnVerde {
		background-color: #089c58;
		color: #fff;
	}

</style>

<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">
	<h1 class="h1cuenta" style="color: #089c58;">¿Deseas Actualizar tu cuenta a vendedor?</h1>
	

	<div class="d-flex justify-content-center align-items-center flex-column">
		
		<p class="label label-danger">Una vez actualizado tu perfil a vendedor, no podrás regresar a tu perfil actual.</p>

		<form action="actualizarCuenta.php" method="post" class="formularioAct">
			<select name="cambiar" class="form-control" id="cambiar">
				<option value="">Elige una opción:</option>
				<option value="cancelar">No deseo actuaizar mi cuenta.</option>
				<option value="actualizar">Si, deseo actuaizar mi cuenta.</option>
			</select>

			<input type="submit" class="btn btnVerde mt-1" value="Aceptar">
		</form>
	</div>
	
</div>




<?php require_once 'include/footer.php'; ?>

</body>



</html>

<?php ob_end_flush(); ?>

