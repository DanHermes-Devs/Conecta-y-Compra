<?php

ob_start();
session_start();

if( !isset($_SESSION['user'])){
	header("Location: login?p=cuenta");
}
else{
	$uid= $_SESSION['user'];
}
require_once 'dbconnect.php';


	// select loggedin users detail
$sql = "SELECT * FROM usuarios WHERE activo = 1 AND id_usuario='".$uid."'";  
$rs_result = mysqli_query ($conn, $sql);  
$row = mysqli_fetch_assoc($rs_result);

require_once 'include/header.php';


?>


<style>
	
	.w-50 {
		width: 50%;
	}

	.m-t {
		margin-top: 1rem;
	}

	#caja-chat {
		width: 100%;
		height: 400px;
		overflow-y: scroll;
	}

	#datos-chat {
		width: 100%;
		padding: 5px;
		margin-bottom: 5px;
		border-bottom: 1px solid silver;
		font-weight: bold;
	}

	.chat-completo {
		width: 60%;
		padding: 2rem;
		-webkit-box-shadow: 0px 10px 21px -11px rgb(0 0 0 / 75%);
		-moz-box-shadow: 0px 10px 21px -11px rgba(0,0,0,0.75);
		box-shadow: 0px 10px 21px -11px rgb(0 0 0 / 75%);
		border-radius: 1%;

		display: flex;
		justify-content: center;
		flex-direction: column;
		margin: 0 auto;
	}

	div#chat {
		display: flex;
		flex-direction: column;
	}

	/*============================================= 
	MOVIL VERTICAL (revisamos en 320px) 
	=============================================*/ 

	@media (max-width:575px){
		.chat-completo {
			width: 100%;
		}

		input#enviar {
			width: 100%;
			padding: 16px 32px;
		}
	}

</style>


<script>

	$(document).ready(function(){

		function mostrarDatos(){
			$.ajax({
				url: "consulta_chat.php",
				type: "GET",
				success: function(response){
					document.getElementById('chat').innerHTML = response;
				}
			})
		}

		setInterval(mostrarDatos, 1000);


		$("#formulario-chat").submit(function(event){
			event.preventDefault();
			enviar();

		})

		function enviar() {
			var datos = $("#formulario-chat").serialize();
			$.ajax({
				type: "post",
				url: "chat.php",
				data: datos,
				success: function(texto){
					$('.mensaje').val('');
				}
			})
		}




	})
	
	
</script>

<div class="container pagecont" onload="ajax();" style="width: 100%; padding: 50px 15px;">
	<div class="container" style="padding-top: 7rem;">
		<div class="row">
			
			<div class="chat-completo">
				<div id="caja-chat">
					<div id="chat">

					</div>
				</div>

				<form method="POST" id="formulario-chat">

					<input type="text" class="form-control m-t" required="true" readonly="true" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="Ingresa tu nombre">

					<input type="text" class="form-control m-t" required="true" readonly="true" name="correo" value="<?php echo $row['email']; ?>" placeholder="Ingresa tu Email">

					<textarea class="form-control m-t mensaje" required="true" name="mensaje" placeholder="Ingresa tu mensaje"></textarea>	
					<input type="submit" class="btn btn-success m-t" name="enviar" id="enviar" value="Enviar">
				</form>
			</div>

		</div>
	</div>
</div>




<?php require_once 'include/footer.php'; ?>