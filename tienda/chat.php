<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])){
		$owner = true;
		$user = $_SESSION['user'];
	}
	
	else{
		
		$user = "01111";
	}
	include_once '../dbconnect.php';

	require_once 'header.php';
	
	
	$id_tienda = $_GET['tienda'];
	
	

	$queryimg = "SELECT * FROM tiendas WHERE id_tienda = $id_tienda";
	
		$resultimg = mysqli_query($conn, $queryimg) or die("Falló la consulta $queryimg");
							$numero_filas = mysqli_num_rows($resultimg);
							
			
							
							
						$rowimg = mysqli_fetch_assoc($resultimg);
						
						$ownertienda 	= $rowimg['id_usuario'];
						$titulotienda 	= $rowimg['titulo'];
						$imagen2		= $rowimg['img2'];
					

						if(	$imagen1 ==""){$imagen1 = "placeholders/banner.png";}
						if(	$imagen2 ==""){$imagen2 = "placeholders/logo.png";}

				if( isset($_SESSION['user'])){
						$titulo = $titulotienda;
					}
					
					else{
						
						$titulo = "Usuario prueba";
					}

						
						



?>


      <!--/Slider-->
<style class="cp-pen-styles">
.carousel-indicators-numbers li {
  text-indent: 0;
  border-radius: 100%;
  color: #fff;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
    margin: 0 5px;
    width: 40px;
    height: 40px;
        font-size: 1.4em;
    line-height: 1.7;
    font-weight: 600;
    background-color: transparent;
    border: 1.5px solid #ed304c;
}
.carousel-indicators .active {
    width: 40px;
    height: 40px;
	margin: 0 5px;
}
.activenum{background-color: #ffbb57!important;}

.bagimg{width:20%; float:left; padding:20px;  max-height: 300px;}
.bagimg img{width:100%; padding:0px;}

.menu-tienda{
list-style:none;
color:#fff;
padding: 0;
margin: 0;

}

.menu-tienda li{
list-style:none;
color:#fff;
display:inline-block;
padding:0 20px;
}

.menu-tienda li a{
list-style:none;
color:#fff;

}

.mainbanner{
    height: 330px;
    background-size: cover;
    background-image: url('placeholders/banner.png');
    background-position: center center;
	margin-top: 120px;
}
.h1-tienda{color:#f5b417; font-weight:600; text-align:center; padding:20px 0 0 0; margin:0; font-size:2em;}
.h3-tienda{color:#ffbb56;text-align:center; padding:0; margin:0; font-size:1.3em;}
.imgdest{
max-width: 100%;
padding: 0px 0;
}

.destcont {
    padding: 10px 0;

}
.prodsection{margin-bottom:50px;}
.imgprod {
    width: 100%;
    padding: 20px;
	transition: 1s ease all;
}

.imgprod:hover{opacity:.5; transition: 1s ease all;}
.prod-desc{
padding: 0 10px;
margin: 2px 0;
color: #222;
font-size: 13px;
}
.precio{color:#da4536; font-weight:600; font-size:1.6em;padding: 0 10px;
margin: 2px 0;}

@media (max-width:800px){
.bagimg{width:50%; float:left;}
}

@media (max-width:500px){
.bagimg{width:100%; float:left;}
}


.col-big{
    position: relative;
	min-height: 1px;
	padding-right: 15px;
	padding-left: 15px;
	width:20%;
}

.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  display: inline-block;

  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.hovereffect:hover .overlay {
  background-color: rgba(48, 152, 157, 0.4);
}

.hovereffect img {
  display: block;
  position: relative;
	width: 100%;
	object-fit: cover;
	object-position: center;
}



.hovereffect p.info {

	cursor: pointer;

  text-decoration: none;
  padding: 7px 14px;
  text-transform: uppercase;
  color: #fff;
  border: 1px solid #fff;
  background-color: transparent;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transform: scale(0);
  -ms-transform: scale(0);
  transform: scale(0);
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
  font-weight: normal;
  margin: auto;
  vertical-align:middle;
  display: flex;
 height: 100%;
justify-content: center;
 align-items: center;
}

.hovereffect:hover p.info {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect p.info:hover {
  box-shadow: 0 0 5px #fff;
}

.img1 {
	width: 100%;
	max-height: 400px;
	object-fit: cover;
	object-position: center;
}

.tooltip {
position: relative;
	opacity: 1;
	text-align: center;
}

<?php 

	if( $_SESSION['user'] != $ownertienda){
		echo '
		
	.hovereffect .overlay {
	display: none;
	}
		';
	}

	if( isset($_SESSION['user'])){
		echo '
		
.chaticon {
	position: fixed;
	z-index: 999999;
	width: 90px;
	height: 90px;
	background-image: url(../img/chat.png);
	bottom: 20px;
	right: 20px;
	background-color: #fff;
	background-size: 70%;
	background-repeat: no-repeat;
	background-position: center;
	border-radius: 50%;
	box-shadow: 0px 2px 3px #000;
	box-shadow: 0 4px 30px rgba(0,0,0,0.20);
	cursor:pointer;
}
		';
	}
	
	
	
	if( $_SESSION['user'] == $ownertienda){
		echo '
		
.chaticon {
display:none;
}
		';
	}

?>


.chaticon {
	position: fixed;
	z-index: 999999;
	width: 90px;
	height: 90px;
	background-image: url(../img/chat.png);
	bottom: 20px;
	right: 20px;
	background-color: #fff;
	background-size: 70%;
	background-repeat: no-repeat;
	background-position: center;
	border-radius: 50%;
	box-shadow: 0px 2px 3px #000;
	box-shadow: 0 4px 30px rgba(0,0,0,0.20);
	cursor:pointer;
}
.headmsg{
	width: 100%;
	border-bottom: 1px solid #ccc;
	text-align: center;
	background-image: url(img/close.png);
	background-repeat: no-repeat;
	background-position: 98%;
	background-size: 1em;
	cursor:pointer;
}

#mensajes {
	width: 100%;
	border: 1px solid #ccc;
	color: #898989;
	padding: 0 2.5%;
	max-width: 600px;
	margin: 0 auto;
	max-height: 300px;
	/* max-height: 30vh; */
	min-height: 300px;
	/* text-align: left; */
	overflow: auto;
}
label {
	width: 100%;
	color: #666;
	text-align: left;
	margin: 0;
}

#formmsg {
	width: 100%;
	max-width: 600px;
	margin: 0 auto;
}

input, textarea {
	border: 1px solid #ccc;
	width: 100%;
	padding: .5em;
	background: transparent;
	margin: .5em 0;
	margin-bottom: 1em;
}

#btnsend1 {
	color: #fff;
	background: #333;
	padding: 1em;
	float: right;
	padding-right: 60px;
	background-image: url(../img/plane.png);
	background-size: 30px;
	background-repeat: no-repeat;
	background-position: 85%;
	transition:1s all ease;
	cursor:pointer;
}

#btnsend1:hover {
	color: #fff;
	background-color: #666;
	background-position: 135%;
	transition: 1s all ease;
}

.errormsg {
	float: left;
	padding: .5em;
	border: 1px solid #f37b90;
	width: 100%;
	margin-bottom: .5em;
	margin-top: -.50em;
	color: #d55858;
	font-weight: 300;
	font-size: .8em;
}

.mensaje-1 {
	width: 100%;
	background: #ccc;
	border-radius: 10px;
	margin: 1em 0;
	padding: .5em;
	float: left;
	margin-bottom: 0;
}


.mensaje-1 h3 {
	text-shadow: none;
	color: #fff;
	font-size: .7em;
	text-align: left;
	padding: .25em;
	/* border-bottom: 1px solid #ddd; */
	margin-top: 0;
	text-align: right;
	font-weight: bold;
}
.mensaje-1 p {
	text-align: left;
	color: #333;
	font-size: .9em;
}

.mensaje-1 h4 {
	text-align: right;
	width: 100%;
	font-size: .5em;
	text-shadow: none;
	margin: 0;
	color: #fff;
}
@media(max-width:900px){
	.info-section {
	padding: 2.5%;
}
	#counter_box {
	width: auto;
}
.mobile{visibility:visible; display: block;}
.desktop{visibility:hidden;}
}

.msg<?php echo $ownertienda; ?> {
	background:#92d1cc;
}

</style> 


   <!-- About Section -->
 <div onclick="self.close()" class="headmsg">
	
		<h1 style="width:auto;  color: #222; text-shadow: none; font-size: 1em; padding: 1em;">MENSAJES</h1>
	</div>
	
	<!-- Info Section -->  
	<section id="info" class="info-section content-section3">
      <div class="container-fluid">
		<div class="col-lg-3 mx-auto event-action-grid " style="margin-bottom: 1em;">
 <img class="imgdest" src="<?php echo utf8_decode($imagen2); ?>">		
		</div>


		<div class="col-lg-12 mx-auto event-action-grid " style="margin-bottom: 1em;">  
			<div id="mensajes"></div>
	  </div>
		<form id="formmsg" class="formperfil" onsubmit="return false" enctype="multipart/form-data" method="post">



			<div class="form-mid">


				<input type="hidden" class="inputform name" id="name" name="name" value="<?php echo utf8_decode($titulo); ?>">
				
				<input type="hidden" class="inputform name" id="user" name="user" value="<?php echo $user; ?>">

			</div>


			<div class="form-mid">


		

				<textarea rows="3" class="inputform" id="msg" placeholder="Escribe tu mensaje" name="msg"  required></textarea>

			</div>




				<div id="respuesta">


				</div>

				<a class="btnredform savepass boton" id="btnsend1">ENVIAR</a>

			</form>
    </section>	
		

<a href="chat?tienda=<?php echo $id_tienda; ?>" target="_blank"><div  class="chaticon"></div></a>

<?php 	require_once 'footer.php'; ?>

	<script>

				
				
			$('#btnsend1').click(function(event){
			var name=$("#name").val();
			var msg=$('#msg').val();
			
			if(name==""|| msg==""){
				$("#respuesta").html("<div class='errormsg'>Completa los campos</div>");$
				}
				else{
					event.preventDefault();
					$.ajax({
						url:"enviamensaje.php",
						type:"POST",
						data:new FormData($('#formmsg')[0]),
						processData:false,
						contentType:false,
						success:function(data){
							$('#msg').val('');
							$('#respuesta').html(data);
							Cargar();
							$("#mensajes").scrollTop($("#mensajes")[0].scrollHeight);
							setTimeout(function(){
								$('.success').slideUp("slow");
								$('.errormsg').slideUp("slow");
								},5000);}});
					}
				});	
				
				function Cargar(){$("#mensajes").load('consultamensajes.php',function(){scrollBottom();});}
				
				function scrollBottom(){
					
					$("#mensajes").scrollTop($("#mensajes")[0].scrollHeight);
					
				}
				
				$(document).ready(function() {
				Cargar();
				
				
				
				});


	</script>

</body>

</html>
