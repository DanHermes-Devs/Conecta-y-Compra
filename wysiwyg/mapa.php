<?php

	ob_start();

	session_start();

	if( isset($_SESSION['user'])){

		$owner = true;

	}



	require_once ('../include/dbconnect.php');



$id_tienda = $_GET['id'];

$queryimg = "SELECT * FROM tiendas WHERE id_tienda = $id_tienda";

	

						$resultimg = mysqli_query($conn, $queryimg) or die("Falló la consulta $queryimg");

							$numero_filas = mysqli_num_rows($resultimg);

							

							if($numero_filas == 0){

								//header('Location: /cyc');

							}

							

						$rowimg = mysqli_fetch_assoc($resultimg);

						

						$id_tienda 	= $rowimg['id_tienda'];

						$ownertienda 	= $rowimg['id_usuario'];

						$tipo 	        = $rowimg['tipo'];

						$email 	        = $rowimg['email'];

						$telefono 	    = $rowimg['telefono'];

						$mapa 	        = $rowimg['mapa'];

						$resumen_servicios 	= $rowimg['resumen_servicios'];

						$detalles_servicios 	= $rowimg['detalles_servicios'];

				







?>





<!DOCTYPE html>

<html lang="es">

<head>

<!-- include libraries(jQuery, bootstrap) -->

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 



<!-- include summernote css/js -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<!-- include summernote-ko-KR -->

<script src="summernote-es-ES.js"></script>



<style>

body {

	padding: 0 5%;

}

h3, .h3 {

	font-size: 22px;

	text-align: center;

	margin-bottom: 20px;

}

#savedata {

	background: #32a81d;

	color: #fff;

	font-size: 20px;

	width: 100%;

	padding: 13px;

	display: inline-block;

	line-height: 1;

	border-radius: 30px;

	text-align: center;

	text-decoration: none;

	cursor: pointer;

}



#respuesta {

	width: 100%;

	display: inline-block;

	padding: 0;

	text-align: center;

}



.errormsg {

	display: inline-block;

	padding: 10px;

	background: #fdd;

	width: 100%;

	margin-bottom: 10px;

	color: #c84141;

}



.sucessmsg {

	width: 100%;

	padding: 10px;

	margin-bottom: 10px;

	background: #e3f1db;

	display: inline-block;

	color: #507a0d;

}





</style>

</head>

<body>

<h3>Ingresa la descripción de tu tienda. Incluya aquí todos los puntos clave y beneficios del servicio o negocio.</h3>

<form method="post" id="formdata">

<input type="hidden" name="id_tienda" id="id_tienda" value="<?php echo $id_tienda;?>">

  <textarea id="summernote" name="mapadata">

	<?php echo $mapa;?>

  </textarea>

  

  <div id="respuesta"></div>

  <a id="savedata">Guardar</a>

  

</form>

  <script>

   $(document).ready(function() {

  $('#summernote').summernote({

    lang: 'es-ES', // default: 'en-US'

	height: 200

  });

});



    $('#savedata').click(function(event){

		



		var mapadata = $("#summernote").val();

		var markupStr = $('#summernote').summernote('code');

		var content = encodeURIComponent($('#summernote').summernote('code'));

		var tienda = $("#id_tienda").val();





		if (mapadata.length < 5 )

	{

		$("#respuesta").html("<div class='errormsg'>Ingresa el código EMBED del mapa.</div>");



	}



	else{

        event.preventDefault();

        $.ajax({

            url : "/cyc/wysiwyg/save_mapa.php",

            type: "POST",

             data : "id_tienda="+tienda+"&mapadata="+content,

            

            success:function(data){



				$('#respuesta').html(data);



				 setTimeout(function() {

                $('.success').slideUp("slow");

				$('.errormsg').slideUp("slow");

            }, 10000);







            }

        });



		}

    });

  </script>

</body>



</html>