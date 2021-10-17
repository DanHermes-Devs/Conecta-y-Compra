<?php require_once 'include/header.php'; ?>
<style>
.card-grid .front, .card-grid .back {
    padding: 10px;
    text-align: center;
    border: 1px #333 solid;
}
.card-grid .back {
    background-color: #333;
    color: white;
}

.back {
        background: #f0f0f0;
    padding: 40px 30px;
    max-height: 85% !important;
    position: absolute !important;
}

.back h2 {
     color: #547dbf;
    font-size: 18px;
    font-weight: 600;
    padding: 10px 10px 5px 10px;
    margin: 10px 0 0 0;

}


.bagimg{width:20%; float:left; padding:20px;  max-height: 300px; min-height:300px;}
.bagimg img{width:100%; padding:0px;}

@media (max-width:800px){
.bagimg{width:50%; float:left;}
}

@media (max-width:500px){
.bagimg{width:100%; float:left;}
}
</style>

<style>
@media(max-width:800px){
.front {

	position: relative!important;

}
.bagimg {
	width: 100%;
	float: left;
	perspective: none !important;
	float: left;
	display: inline-block;
	max-height: none;
	padding: 0;
}
.container.pagecont {
	margin-top: 50px !important;
}
}

</style>

    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; margin-top:100px;">
	   
           <div class="col-sm-12 col-md-12" style="padding:0; text-align: center;">
		   
		  
		   <a href="somos.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/bag1.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>CONECTA</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div>
			</a>
			
			<a href="miembros.php">
		<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/miembros.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>MIEMBROS</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			
				<a href="equipo.php">
		<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/equipo.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>EQUIPO</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			

			<a href="membresias.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/membresias.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>MEMBRESÍAS</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			
			<a href="garantias-reembolsos.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/garantia.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>GARANTÍAS Y REEMBOLSOS</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div>	</a>
		
	
			
			<a href="metodos-pago.php"><div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/metodospago.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>MÉTODOS DE PAGO</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			

			<a href="comisiones.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/comisiones.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>COMISIONES</h2>
					<p>Da click para conocer más.</p>
				</div> 
				</div></a>
	
			<a href="tarifas.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/envio.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>ENVÍO</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			
			
			<a href="reglas.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/reglas.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>REGLAS</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
			
			   <a href="faqs.php">
			<div class="card bagimg"> 
				<div class="front"> 
					<img src="img/bags/faqs.jpg">
				</div> 
				<div class="back" style="color:#333;">
					<h2>FAQS</h2>
					<p>Da click para conocer más.</p>
				</div> 
			</div></a>
				   

	
		</div>
	</div>
	
	<?php require_once 'include/footer.php'; ?>
	<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

	
	<script>


 $(function(){
        
        $(".card").flip({
          trigger: 'hover'
        });
		
});


	</script>
	

</body>

</html>
