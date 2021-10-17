<?php 

ob_start();
session_start();
if( !isset($_SESSION['user'])){
	header("Location: login?p=cuenta");
}
else{
	$uid= $_SESSION['user'];
}

$opcionesUpdate = $_POST["cambiar"];

include_once 'dbconnect.php';

require_once 'include/header.php';


$sql = "SELECT * FROM usuarios WHERE activo = 1 AND id_usuario='".$uid."'";  
$rs_result = mysqli_query ($conn, $sql);  
$row = mysqli_fetch_assoc($rs_result);

?>
<style>
	.btnVerde {
		background-color: #089c58;
		color: #fff;
		text-align: center;
		display: flex;
		justify-content: center;
		width: 50%;
		margin: 0 auto;
	}
</style>




<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">

	<?php 
	if ($_POST["cambiar"] == "actualizar") {
		$sql2 = "UPDATE usuarios SET id_perfil = 1 WHERE id_usuario = '".$uid."'";
		$rs_result2 = mysqli_query ($conn, $sql2);
		if ($rs_result2 == 1) {
			echo '<h1 class="h1cuenta" style="color: #089c58;">Tu cuenta a Vendedor se actualizó con éxito.</h1>';
			echo '<a href="cuenta" class="btn btnVerde"> Ir a mi cuenta </a>';			
		} else {
			echo '<h1 class="h1cuenta" style="color: #db4537;">Hubo un error, intentalo mas tarde.</h1>';
		}
		
		
		
	} else if ($_POST["cambiar"] == "cancelar") {
		header("location: cuenta");
	}

	?>
	
	
</div>


<?php require_once 'include/footer.php'; ?>

</body>



</html>
