    <!-- INICIA FOOTER -->
    <div style="width:100%; background-color:#e5e5e5; float: left; padding:10px 30px;" id="cycfooter">


    	<div class="footmenu" >
    		<h2>CONECTA Y COMPRA</h2>

    		<ul class="listado-footmenu">
    			<li>
    				<a href="/cyc/somos">Quiénes Somos</a>
    			</li>
    			<li>
    				<a href="/cyc/como-funciona">Cómo Funciona</a>
    			</li>
    			<li>
    				<a href="/cyc/miembros">Miembros</a>
    			</li>
    			<li>
    				<a href="/cyc/equipo">Equipo</a>
    			</li>
    			<li>
    				<a href="/cyc/membresias">Membresías</a>
    			</li>
    			<li>
    				<a href="/cyc/aviso">Aviso de privacidad</a>
    			</li>

    		</ul>
    	</div>
    	<div class="footmenu" >
    		<h2>AYUDA</h2>

    		<ul class="listado-footmenu">
    			<li>
    				<a href="/cyc/soporte">Soporte</a>
    			</li>
    			<li>
    				<a href="/cyc/garantias-reembolsos">Garantías y Reembolsos</a>
    			</li>

    			<li>
    				<a href="/cyc/contacto">Contacto</a>
    			</li>

    			<li>
    				<a href="/cyc/faqs">Faq's</a>
    			</li>

    		</ul>
    	</div>
    	<div class="footmenu" >
    		<h2>MÉTODOS DE PAGO</h2>

    		<ul class="listado-footmenu">
    			<li>
    				<a href="/cyc/metodos-pago">Métodos de pago</a>
    			</li>

    			<li>
    				<a href="/cyc/tdc">Tarjetas de crédito</a>
    			</li>
    			<li>
    				<a href="/cyc/msi">Meses sin intereses</a>
    			</li>
    			<li>
    				<a href="/cyc/tiendasdc">Depósitos en tiendas de conveniencia</a>
    			</li>


    		</ul>
    	</div>
    	<div class="footmenu" >
    		<h2>ENVÍOS</h2>

    		<ul class="listado-footmenu">
    			<li>
    				<a href="/cyc/tarifas">Tarifas</a>
    			</li>
                    <!--<li>
                        <a href="#">Zonas</a>
                    </li>
                    <li>
                        <a href="#">Tiempos de Entrega</a>
                    </li>-->


                </ul>
            </div>
            <div class="footmenu" >
            	<a href="/cyc/ayuda">
            		<img src="/cyc/img/bag.png" style="width:50%;">
            	</a>
            </div>


        </div>
        <!-- /.container -->

        <div id="footergreen" style="width:100%; float:left; background:#179e59; padding:40px;">
        	<p style="font-size:12px; color: #fff; float:left;">Conecta y Compra ©  Copyright 2019. All rights reserved.</p>
        	<p style="font-size:12px; color: #fff; float:right;" class="linksfooter">	<a target="_blank" style="color:#fff;" href="/cyc/terminos-condiciones.pdf">Términos y condiciones</a> | <a style="color:#fff;" href="/cyc/aviso">Aviso de privacidad</a></p>
        </div>


        <!-- Bootstrap Core JavaScript -->
        <script src="/cyc/js/bootstrap.min.js"></script>
        <script src="/cyc/js/bootstrap-tagsinput.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="/cyc/recaptcha/validator.js"></script>
        <script src="/cyc/recaptcha/contact.js"></script>
        <script src="/cyc/js/waitMe.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        

        <script src="js/jSignature.js"></script>
        <script src="js/jSignature.CompressorSVG.js"></script>

        <script type="text/javascript">
		/*var LHCChatOptions = {};
		LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'digitaltryout.com'};
		(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
		var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
		po.src = '//digitaltryout.com/cyc/chat/index.php/esp/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();*/


</script>

<script>


	$(window).load(function() {
		$("#iconclose").trigger("click");
		$(".splash").fadeOut("slow");
		$("body").fadeIn("fast");
	});

	$('body').on('click','.btnchat2', function(e) {
		e.preventDefault();
		   //$('.status-icon').trigger('click');
		   $('#maximizeChat').trigger('click');
		});

	$(".imgcyc").click(function(){
		window.location = '/cyc/tienda/ejemplo';
	});

	$(".imgcycs").click(function(){
		window.location = '/cyc/cyc-servicios';
	});

	$(".logged .addwish").click(function(){
		var idw = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		$.ajax({
			url : "/cyc/wish.php",
			type: "POST",
			data : "a=a&p="+idp+"&u="+idu+"&t="+idt,

			success:function(data){
				$('#respuestawish').html(data);
				idw.find(".textwish").text("Quitar de Wishlist");
				idw.find(".iconwish").removeClass("glyphicon-heart-empty");
				idw.find(".iconwish").addClass("glyphicon-heart");
				idw.removeClass("addwish");
				idw.addClass("removewish");

				setTimeout(function() {
					$('.success').slideUp("slow");
					$('.errormsg').slideUp("slow");
				}, 8000);

			}
		});



	});

	function updateCheckout() {

		$("#loadcart").load("https://digitaltryout.com/cyc/inlinecart.php", function() {
			var sub = $("#loadcart .subtotalnumber").text();
			var subnum = parseFloat(sub);
			var envio = $(".envio").attr("data-envio");
			var envionum = parseFloat(envio);
			var suma = subnum + envionum;
			var sumastring = suma.toString();
			setTimeout(function() {
				$(".subtotal span").text(sub);
				$(".subtotal input").val(sub);
				$(".sumatotal span").text(sumastring);
				window.monto = sumastring;
				window.subtotal = sub.toString();
				window.shipping = envio.toString();
			}, 1000)


		});

	}

	$(".logged").on("click", ".removewish", function(){

		var idw = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		$.ajax({
			url : "/cyc/wish.php",
			type: "POST",
			data : "a=d&p="+idp+"&u="+idu+"&t="+idt,

			success:function(data){


				setTimeout(function() {
					$('#respuestawish').html(data);
					idw.find(".textwish").text("Añadir a Wishlist");
					idw.find(".iconwish").removeClass("glyphicon-heart");
					idw.find(".iconwish").addClass("glyphicon-heart-empty");
					idw.removeClass("removewish");
					idw.addClass("addwish");
					$('.success').slideUp("slow");
					$('.errormsg').slideUp("slow");
				}, 200);



			}
		});

	})


	$(".anon .addwish").click(function(){

		alert("Inicia sesión para usar la Wishlist.");

	});


	function loadCart(){
		$("#algoaqui").html('');
		var idc = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		var qty = $(this).attr("data-qty");
		$.ajax({
			url : "/cyc/cartaction.php",
			type: "POST",
			data : {
				funcion: "funcion1"
			},
			success:function(data){
				var datos = JSON.parse(data);
				var carro = datos.carrito;
				carro.forEach(element => {
					$("#algoaqui").append(`
							<tr id="lista">
								<td style="text-align: center;">
									<img class="imgprod tdimg" src="/cyc/${element.imagen}">
								</td>
								<td>${element.producto}</td>
								<td>$${element.precio}</td>
								<td>${element.cantidad}</td>
								<td>$${element.precio}</td>
								<td> <img onclick="fntdelItem(this)" src="/cyc/img/delete.png" data-idp="${element.id_producto}" data-id="${element.id_producto_encrypt}" op="1" width="20px" border="0" alt="Eliminar" style="width:20px; margin: 0 10px; cursor: pointer; background: none; display: inline-block; padding: 0;"></td>
							</tr>
					`);
				});
				var datosCarrito = data.cantCarrito;
				$("#circlenumber").attr('data-notify', datos.cantCarrito);
				$("#circlenumber").html("");
				var da = $("#circlenumber").attr('data-notify');
				$("#circlenumber").append(da);
				
			}
		});	
	};

	loadCart();

	function loadCart2(){
		$("#algoaqui2").html('');
		var idc = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		var qty = $(this).attr("data-qty");
		$.ajax({
			url : "/cyc/cartaction.php",
			type: "POST",
			data : {
				funcion: "funcion1"
			},
			success:function(data){
				var datos = JSON.parse(data);
				console.log(datos)
				var carro = datos.carrito;
				carro.forEach(element => {
					$("#algoaqui2").append(`
							<tr>
								<td style="text-align: center; ">
									<img class="imgprod tdimg" src="/cyc/${element.imagen}">
								</td>
								<td>${element.producto}</td>
								<td>$${element.precio}</td>
								<td>${element.cantidad}</td>
								<td>$${element.precio}</td>
								<td> <img onclick="fntdelItem(this)" src="/cyc/img/delete.png" data-idp="${element.id_producto}" data-id="${element.id_producto_encrypt}" op="1" width="20px" border="0" alt="Eliminar" style="width:20px; margin: 0 10px; cursor: pointer; background: none; display: inline-block; padding: 0;"></td>
							</tr>
					`);
				});
				var datosCarrito = data.cantCarrito;
				$("#circlenumber").attr('data-notify', datos.cantCarrito);
				$("#circlenumber").html("");
				var da = $("#circlenumber").attr('data-notify');
				$("#circlenumber").append(da);
				
			}
		});	
	};

	loadCart2();
	
	$(".addcart").click(function(){
		var idc = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		var qty = $(this).attr("data-qty");
		$.ajax({
			url : "/cyc/cartaction.php",
			type: "POST",
			data : {
				a: "a",
				p: idp,
				u: idu,
				t: idt,
				qty: qty,
				funcion: "funcion2"
			},
			success:function(data){
				var datos = JSON.parse(data);
				console.log(datos)
				loadCart();
				updateCheckout();
				var datos = JSON.parse(data);
				var datos = JSON.parse(data);
				var carro = datos.carrito;
				var datosCarrito = data.cantCarrito;
				$("#circlenumber").attr('data-notify', datos.cantCarrito);
				$("#circlenumber").html("");
				var da = $("#circlenumber").attr('data-notify');
				$("#circlenumber").append(da);
				
			}
		});	
	});
	// $("#subtotal").load();
	function fntdelItem(dato){
		console.log(dato);
		// updateCheckout();
		var option = dato.getAttribute('op');
		var dataId = dato.getAttribute('data-id');
		var idp = dato.getAttribute('data-idp');
		if(option == 1 || option == 2){
			$.ajax({
				url : "/cyc/delCartAction.php",
				type: "POST",
				data : "p="+idp+"&option="+option+"&dataId="+dataId,
				success:function(data){
					// console.log(data);
					var datos = JSON.parse(data);
					console.log(datos);
					Swal.fire({
						title: 'Producto eliminado',
						text: 'Producto Eliminado correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Ok'
					}).then((result) => {
						if (result.isConfirmed) {
							loadCart();
							loadCart2();
							updateCheckout();
							$("#subtotal").load();
							var datosCarrito = data.cantCarrito;
							$("#circlenumber").attr('data-notify', datosCarrito);
							$("#circlenumber").html("");
							var da = $("#circlenumber").attr('data-notify');
							$("#circlenumber").append(da);
							location.reload();
						}
					});
			}
		});
		}
	}

	$("body").on("click", ".removecart", function(){
		var idc = $(this);
		var idp = $(this).attr("data-idp");
		var idu = $(this).attr("data-idu");
		var idt = $(this).attr("data-idt");
		var qty = $(this).attr("data-qty");
		$.ajax({
			url : "/cyc/cartaction.php",
			type: "POST",
			data : "a=d&p="+idp+"&u="+idu+"&t="+idt+"&qty="+qty,

			success:function(data){
				idc.find(".textcart").text("Añadir al Carrito");
				idc.find(".iconcart").removeClass("glyphicon-remove");
				idc.find(".iconcart").addClass("glyphicon-shopping-cart");
				idc.removeClass("removecart");
				idc.addClass("addcart");
				idc.addClass("agregar-carrito");
				// updateCart();


			}
		});



	})

	</script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/5c921189101df77a8be38a4f/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	<a href="https://icons8.com/icon/2962/biberón"></a>
	
	
