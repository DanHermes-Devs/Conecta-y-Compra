<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
}
$uid = $_SESSION['user'];

include_once 'dbconnect.php';

require_once 'include/header.php';
$sid = session_id();
// unset($_SESSION['dataorden']);
?>

<style>
	@media(max-width:800px) {
		.container.pagecont {
			margin-top: 50px !important;
		}

		.h1cuenta {
			font-size: 22px;

		}

		table {
			width: 100%;
			min-width: 100%;
			margin-bottom: 30px;
		}

		.pagecont .container {
			padding-top: 0 !important;
			padding: 0;
			margin: 0;
		}

		.col-md-6 {
			width: 100%;
			margin-bottom: 30px;
		}
	}


	#loadcart {
		margin-bottom: 5rem;
	}

	table {

		width: 100%;

		min-width: 200px;

		font-size: 12px;

	}



	#inlinecart {

		background: transparent;

		color: #333;

		font-size: 1.4em;

	}



	#inlinecart .imgprod,
	.checkout .imgprod {

		max-width: 100%;

		padding: 10px;

		border-radius: 20px;

		max-width: 130px;

	}



	.infopoints {
		width: 50%;
		float: left;
		padding: 10px 0;
		font-size: .8em;
	}

	.brown1 {
		color: #6a504f;
	}



	.modal-body {

		position: relative;

		padding: 15px;

		max-height: 72vh;

		overflow: auto;

	}



	.containerprods {

		padding: 0 10%;

	}



	.imgprod.tdimg {

		padding: 0 !important;

		width: 50px;

		height: 50px;

		border-radius: 5px !important;

		object-fit: cover;

		object-position: center;



	}



	.nowish {

		width: 100%;

		text-align: center;

		padding: 5%;

		border: 3px dashed #eaeaea;

		border-radius: 20px;

		background: #fbfbfb;

		line-height: 1.6;

		color: #646464;

		font-size: 20px;

	}



	.nowish .glyphicon {

		color: #da4536;

		font-size: 40px;

	}

	.d-flex {
		display: flex;
		gap: 2rem;
		text-align: left;
		align-items: center;
	}

	.mt-3 {
		margin-top: 3rem;
	}

	/* Deshabilitar botones paypal */
	.disabledContent {
		pointer-events: none !important;
		opacity: 0.4 !important;
	}
</style>

<!-- Page Content -->
<div class="container pagecont" style="width: 100%;
padding: 50px 15px; margin-top:100px;">

	<div class="container checkout">

		<h1 class="h1cuenta">TERMINAR COMPRA</h1>

		<div class="col-md-12 text-center">
			<div id="loadcart">
				<div class="container" style="width:100%;">



					<div class="col-md-12 text-center">
						<div class="table-container">


							<?php
							$iduserc = $_SESSION['cartuser'];
							$numero_filasc = 0;

							if (strlen($iduserc) > 0) {
								$suma = 0;

								$queryc = "SELECT *, COUNT(id_producto) as numprods FROM cart WHERE id_usuario = '$iduserc' GROUP BY id_producto";

								($resultc = mysqli_query($conn, $queryc)) or die("Falló la consulta $queryc");

								$numero_filasc = mysqli_num_rows($resultc);

								while ($rowc = mysqli_fetch_assoc($resultc)) {

									$idprodc = $rowc['id_producto'];
									$cantidad = $rowc['numprods'];

									$query = "SELECT * FROM productos WHERE id_producto = $idprodc";

									($result = mysqli_query($conn, $query)) or die("Falló la consulta $query");

									while ($row = mysqli_fetch_assoc($result)) {
										if ($row['precio2'] > 0) {
											$precio = $row['precio2'];
										} else {
											$precio = $row['precio1'];
										}
									}
								}
							}

							?>
							<table width="100%">

								<thead>

									<tr style="color: #005B9C; font-size: 14px; text-transform: uppercase;">

										<td align="center" class="tdimg"><b></b></td>
										<td align="center"><b>Nombre</b></td>
										<td align="center"><b>Precio</b></td>
										<td align="center"><b>Cantidad</b></td>
										<td align="center"><b>Total</b></td>
										<td align="center"></td>
									</tr>

								</thead>

								<tbody id="algoaqui2">



									<?php
									$total = 0;
									if (isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0) {
										foreach ($_SESSION['arrCarrito'] as $producto) {
											$total += $producto['cantidad'] * $producto['precio'];
											$totalProd = $producto['cantidad'] * $producto['precio'];
											$idproducto = openssl_encrypt($producto["id_producto"], "AES-128-ECB", "conectaycompra"); ?>

									<?php }
									}
									?>



								</tbody>

							</table>



							<h3 class="<?php echo $shownocart; ?> totalcart"><span class="brown1">TOTAL: </span> $<span class="subtotalnumber"><?php echo bcdiv($total, '1', 2); ?></span></h3>





						</div>
					</div>

				</div>
			</div>
			<style>
				.cart_totals {
					border: 3px solid #4d4d4d;
					padding: 40px;
				}

				.wc-proceed-to-checkout a {
					display: inline-block;
					width: 100%;
					cursor: pointer;
					font-size: 18px;
					padding: 11px 0;
					text-align: center;
					background-color: #169e58;
					color: white;
					text-transform: uppercase;
					-webkit-transition: 0.5s linear;
					-moz-transition: 0.5s linear;
					-ms-transition: 0.5s linear;
					-o-transition: 0.5s linear;
					transition: 0.5s linear;
					margin-top: 20px;
				}

				.shop_table td {
					border-top: 1px solid #e6e6e6;
					padding: 36px 12px;
					vertical-align: middle;
				}

				.cart_totals table th {
					padding-right: 10px;
					padding-bottom: 0;
					padding-left: 0 !important;
					vertical-align: middle;
					line-height: 20px;
					text-align: left;
					font-size: 15px;
					color: #1a1a1a;
				}

				.woocommerce-cart .shop_table td {
					border-bottom: 1px solid #e6e6e6;
				}


				.cart_totals table .cart-subtotal td {
					text-align: right;
				}

				.cart_totals table td {
					vertical-align: middle;
					padding: 8px 0;
					line-height: 2em;
					text-align: right;
				}

				.cart_totals h2 {
					font-size: 20px;
					margin-bottom: 35px;
					color: #000;
					text-transform: uppercase;
				}

				.cart_totals table {
					min-width: 100%;
				}

				.checkout .totalcart {
					display: none;
				}

				.hazpago {
					font-weight: bold;
					color: #547dbf;
					font-size: 20px;
					padding: 10px;
				}
			</style>

			<div class="col-md-6">
				<h2> <b>Datos de Envío</b> </h2>
				<div class="">
					<div class="input-group input-group-sm">
						<span class="input-group-addon" id="sizing-addon3">C.P.</span>
						<input placeholder="Dónde entrega" class="form-control cpDestino" id="cpDestino" name="cpDestino">
					</div>

					<div class="input-group input-group-sm" style="margin-top: 1rem;">
						<span class="input-group-addon" id="sizing-addon3">Ciudad</span>
						<input placeholder="Ciudad" id="ciudad" class="form-control">
					</div>

					<div class="input-group input-group-sm" style="margin-top: 1rem;">
						<span class="input-group-addon" id="sizing-addon3">Colonia</span>
						<input placeholder="Colonia" id="colonia" class="form-control">
					</div>

					<div class="input-group input-group-sm" style="margin-top: 1rem;">
						<span class="input-group-addon" id="sizing-addon3">Calle</span>
						<input placeholder="Calle" id="calle" class="form-control">
					</div>

					<button class="btn btn-success" style="margin-top: 1rem;" id="btn-consultar">Consultar costo de envío</button>
				</div>

				<div class="p-5 mt-5 bg-secondary text-white" id="dataInfo"></div>

			</div>
			<div class="col-md-6" id="checkout-1">
				<div class="cart-collaterals">
					<div class="cart_totals ">


						<h2>Total del carrito</h2>

						<table cellspacing="0" class="shop_table shop_table_responsive">

							<tbody>
								<tr class="cart-subtotal">
									<th>Subtotal</th>
									<td data-title="Subtotal" class="subtotal">$<span></span><input type="hidden" id="subtotal"></td>
								</tr>




								<tr class="shipping">
									<th>Envío</th>
									<td data-title="Envío" id="envio" class="envio" data-envio="">$<span id="precioEnvio"></span><input type="hidden" id="costodeEnvio"></td>

								</tr>


								<tr class="order-total">
									<th>Total</th>
									<td data-title="Total" class="sumatotal" data-total=""><strong>$<span></span></strong> </td>
								</tr>


							</tbody>
						</table>

						<div class="wc-proceed-to-checkout">
							<p class="hazpago">Haz tu pago</p>

							<!-- Set up a container element for the button -->
							<div id="paypal-button-container"></div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<input type="hidden" id="idUsuario" value="<?php echo $uid ?>">
<!-- Peticion a Debox -->
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.css">
<!-- Include the PayPal JavaScript SDK -->
<!-- ASykYxHRUhvwkIagymddBVtQq1EB4Z_Zve-30iPOqvp1-XDdWIB8FOstldYHQtIuqGU5p1HsVDxf6cPO -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.paypal.com/sdk/js?client-id=ATxCHhd1xQciCQl1erSnflQDdJ8d3TVNNGNwd4rmV8eql5sb2BbpGp00gBKoaPVAt0wQ2QTws5AFlg0w&currency=MXN"></script>
<script>
	$("#paypal-button-container").addClass("disabledContent");
	window.monto = "";
	window.subtotal = "";
	window.shipping = "";
	$(window).load(function() {
		updateCheckout();
	});

	$("body").on("click", ".checkout", function() {
		updateCheckout();
	})

	$("body").on("click", ".removecart", function() {

		setTimeout(function() {
			updateCheckout();
		}, 500)
	})

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

	window.monto = $(".sumatotal").attr("data-total");
	// window.monto = $(".sumatotal").text("");
	window.monto = "'" + window.monto + "'";
	window.subtotal = $("#loadcart .subtotalnumber").text();
	window.subtotal = "'" + window.subtotal + "'";
	window.shipping = $(".envio").attr("data-envio");
	window.shipping = "'" + window.shipping + "'";

	var tokenDebox = '';
	var destino = '';
	var ciudad = '';
	var colonia = '';
	var calle = '';
	// Peticion Token
	$(document).ready(function() {
		$.ajax({
			"url": "https://debox.mx:8443/debox/security/login",
			"method": "POST",
			"timeout": 0,
			"headers": {
				"Content-Type": "application/json"
			},
			"data": JSON.stringify({
				"username": "dan@wearetrafika.com",
				"password": "M2rgi7AiYmXr8z2",
				"sessionTime": 720
			}),
		}).done(function(responseLogin) {
			tokenDebox = responseLogin.token;
			// Peticion Proveedores
			$.ajax({
				"url": "https://debox.mx:8443/debox/catalogues/provider/all",
				"method": "GET",
				"timeout": 0,
				"dataType": 'JSON',
				"headers": {
					"Content-Type": "application/json",
					"token": `${responseLogin.token}`
				},
				beforeSend: function() {
					// $('#myForm').waitMe();
				}
			}).done(function(responseProveedor) {
				console.log(tokenDebox);
				$("body").on('click', '#btn-consultar', function(e) {
					e.preventDefault();
					destino = $('#cpDestino').val();
					ciudad = $('#ciudad').val();
					colonia = $('#colonia').val();
					calle = $('#calle').val();
					console.log(destino)
					console.log(ciudad)
					console.log(colonia)
					console.log(calle)

					$.ajax({
						"url": "https://debox.mx:8443/debox/quotation",
						"method": "POST",
						"timeout": 0,
						"headers": {
							"Content-Type": "application/json"
						},
						"data": JSON.stringify({
							"senderAddress": {
								"zipcode": {
									"code": 54485
								}
							},
							"recipientAddress": {
								"zipcode": {
									"code": `${destino}`
								}
							},
							"insuranceCost": 0,
							"packageProfiles": [{
								"length": 0,
								"height": 0,
								"width": 0,
								"weight": 0,
								"insuredValue": 1000,
								"packageProfileType": {
									"serial": 1
								}
							}]
						}),
						beforeSend: function() {
							$('.cart-collaterals').waitMe({
								text : 'Espere por favor, estamos consultando su Código Postal.',
							});
						}
					}).done(function(responseCotizacion) {
						$('#detallesCotizacion').removeClass('d-none');
						var cpOrigen = responseCotizacion[0].senderAddress.zipcode.code;
						var estadoDestino1 = responseCotizacion[0].senderAddress.zipcode.city;
						var cpDestino = responseCotizacion[0].recipientAddress.zipcode.code;
						var estadoDestino2 = responseCotizacion[0].recipientAddress.zipcode.city;

						if (estadoDestino1 == "") {
							estadoDestino1 = responseCotizacion[0].senderAddress.zipcode.state.name;
						}

						// $("#dataInfo").append(`

						//   `);

						console.log(responseCotizacion);

						var costoEnvio = responseCotizacion[0].totalRate.toFixed(2);

						$(".envio").attr("data-envio", costoEnvio);
						$("#precioEnvio").append(costoEnvio);
						var sub = $("#loadcart .subtotalnumber").text();
						var subnum = parseFloat(sub);
						var envio = $(".envio").attr("data-envio");
						var envionum = parseFloat(envio);
						var suma = subnum + envionum;
						var sumastring = suma.toString();
						if (envio != "") {
							$("#paypal-button-container").removeClass("disabledContent");
						}
						setTimeout(function() {
							$(".subtotal span").text(sub);
							$(".subtotal input").val(sub);
							$(".envio input").val(costoEnvio);
							$(".sumatotal span").text(sumastring);
							window.monto = sumastring;
							window.subtotal = sub.toString();
							window.shipping = envio.toString();
						}, 1000);

						// Render the PayPal button into #paypal-button-container
						paypal.Buttons({
							// Set up the transaction
							createOrder: function(data, actions) {

								return actions.order.create({
									purchase_units: [{
										"reference_id": "conecta_compra",
										"description": "Conecta y Compra",
										"amount": {
											"currency": "MXN",
											"value": window.monto,
											"amount_breakdown": {
												"subtotal": window.subtotal,
												"shipping": window.shipping,
												"tax": "0.33"
											}
										}
									}],
									"redirect_urls": {
										"return_url": "https://digitaltryout.com/cyc/pedido-relaizado",
										"cancel_url": "https://digitaltryout.com/cyc/cancelar"
									},
								});
							},

							// Finalize the transaction
							onApprove: function(data, actions) {
								return actions.order.capture().then(function(details) {
									console.log(tokenDebox);
									ciudad = $('#ciudad').val();
									colonia = $('#colonia').val();
									calle = $('#calle').val();
									if (details.stauts = "COMPLETED") {
										var settings = {
											"url": "https://debox.mx:8443/debox/card?searchTerm=Jose Ramon Millan",
											"method": "GET",
											"timeout": 0,
											"headers": {
												"Content-Type": "application/json",
												"token": "601983f2-a8e3-4e96-9a7f-88d76f0023fe"
											},
										};

										$.ajax(settings).done(function(response) {
											contenido.push(response.elements[0]);
											var settings = {
												"url": "https://debox.mx:8443/debox/processOrder",
												"method": "POST",
												"timeout": 0,
												"headers": {
													"Content-Type": "application/json",
													"token": "6209f264-59f4-4513-88c0-3ce1bb7f8234"
												},
												"data": JSON.stringify({
													"paymentMethod": {
														"id": "05005b3a-fcdc-4b30-9311-e91b18c9aa48",
														"createdOn": 1600054092654,
														"updatedOn": null,
														"enabled": true,
														"deleted": false,
														"serial": 1,
														"name": "Tarjeta Crédito"
													},
													"order": {
														"shipments": [{
															"packageProfiles": [{
																"user": {
																	"profile": {},
																	"person": {
																		"address": {
																			"zipcode": {
																				"state": {
																					"country": {}
																				}
																			}
																		},
																		"personType": {},
																		"entityType": {}
																	}
																},
																"packageProfileType": {
																	"name": "Documento",
																	"serial": 2
																},
																"weight": 0.5,
																"note": "Sandalias",
																"name": "Sandalias"
															}],
															"origin": {
																"person": {
																	"address": {
																		"id": null,
																		"createdOn": null,
																		"updatedOn": null,
																		"enabled": null,
																		"deleted": null,
																		"serial": null,
																		"name": null,
																		"zipcode": {
																			"id": "ef353cb5-437e-4563-96f0-668eb6191d30",
																			"createdOn": 1600029528843,
																			"updatedOn": null,
																			"enabled": true,
																			"deleted": false,
																			"serial": 28418,
																			"code": "03810",
																			"state": {
																				"id": "da02d240-85ec-4d40-a8ba-a1f841ea9b63",
																				"createdOn": 1600023964303,
																				"updatedOn": null,
																				"enabled": true,
																				"deleted": false,
																				"serial": 9,
																				"name": "Ciudad de México",
																				"code": "DF",
																				"country": {
																					"id": "a4778b88-b94f-4058-b816-75c4c774d173",
																					"createdOn": 1600023942919,
																					"updatedOn": null,
																					"enabled": true,
																					"deleted": false,
																					"serial": 137,
																					"name": "México",
																					"iso_2": "MX",
																					"iso_3": "MEX",
																					"phoneCode": "52"
																				}
																			},
																			"city": "Ciudad de México",
																			"colony": "Nápoles",
																			"suburb": "Benito Juárez"
																		},
																		"addressType": null,
																		"countryOptional": {
																			"id": "a4778b88-b94f-4058-b816-75c4c774d173",
																			"createdOn": 1600023942919,
																			"updatedOn": null,
																			"enabled": true,
																			"deleted": false,
																			"serial": 137,
																			"name": "México",
																			"iso_2": "MX",
																			"iso_3": "MEX",
																			"phoneCode": "52"
																		},
																		"stateOptional": null,
																		"cityOptional": null,
																		"street": "arkansas",
																		"externalNumber": "5",
																		"internalNumber": "802",
																		"colonyOptional": null,
																		"zipcodeOptional": null,
																		"suburbOptional": null,
																		"notes": null,
																		"fullStreet": ""
																	},
																	"personType": {},
																	"entityType": {},
																	"names": "Jorge",
																	"lastNames": "Perez Aramis",
																	"phone": "5556575859"
																},
																"deleted": true,
																"name": "N/A"
															},
															"destination": {
																"person": {
																	"address": {
																		"id": null,
																		"createdOn": null,
																		"updatedOn": null,
																		"enabled": null,
																		"deleted": null,
																		"serial": null,
																		"name": null,
																		"zipcode": {
																			"id": "14b1ba4f-a58f-4d4c-8e25-4a38b39cd927",
																			"createdOn": 1600036605089,
																			"updatedOn": null,
																			"enabled": true,
																			"deleted": false,
																			"serial": 67517,
																			"code": "53125",
																			"state": {
																				"id": "7f2372b6-765a-4308-bb67-fff9e93c7a6f",
																				"createdOn": 1600023965437,
																				"updatedOn": null,
																				"enabled": true,
																				"deleted": false,
																				"serial": 15,
																				"name": "México",
																				"code": "EM",
																				"country": {
																					"id": "a4778b88-b94f-4058-b816-75c4c774d173",
																					"createdOn": 1600023942919,
																					"updatedOn": null,
																					"enabled": true,
																					"deleted": false,
																					"serial": 137,
																					"name": "México",
																					"iso_2": "MX",
																					"iso_3": "MEX",
																					"phoneCode": "52"
																				}
																			},
																			"city": `${ciudad}`,
																			"colony": `${colonia}`,
																			"suburb": "Naucalpan de Juárez"
																		},
																		"addressType": null,
																		"countryOptional": {
																			"id": "a4778b88-b94f-4058-b816-75c4c774d173",
																			"createdOn": 1600023942919,
																			"updatedOn": null,
																			"enabled": true,
																			"deleted": false,
																			"serial": 137,
																			"name": "México",
																			"iso_2": "MX",
																			"iso_3": "MEX",
																			"phoneCode": "52"
																		},
																		"stateOptional": null,
																		"cityOptional": null,
																		"street": `${calle}`,
																		"externalNumber": "19",
																		"internalNumber": null,
																		"colonyOptional": null,
																		"zipcodeOptional": null,
																		"suburbOptional": null,
																		"notes": null,
																		"fullStreet": ""
																	},
																	"personType": {},
																	"entityType": {},
																	"names": "Antonia",
																	"lastNames": "Perez Aramis",
																	"phone": "5453525150"
																},
																"deleted": true,
																"name": "N/A"
															},
															"insuranceCost": 0,
															"fiscalNumber": null,
															"shipmentBilling": false,
															"shipmentPickup": false,
															"guide": null,
															"provider": {
																"id": "c5cb4589-b422-4e71-995d-144afee33340",
																"createdOn": 1600054093523,
																"updatedOn": null,
																"enabled": true,
																"deleted": false,
																"serial": 1,
																"name": "RedPack"
															},
															"providerProductId": "2",
															"providerProductName": "ECOEXPRESS",
															"providerProductDescription": "Terrestre (2 - 5 días)",
															"shipmentPaid": false,
															"shipmentCost": 232.6496,
															"shipmentDiscount": 231.6469,
															"shipmentAcceptItems": true
														}],
														"orderAcceptItems": true,
														"orderConditions": true,
														"orderCost": 232.6496,
														"orderDiscount": 231.6469,
														"orderInsuranceCost": 0
													},
													"card": {
														contenido,
														"save": false
													},
													"shipmentsPayments": [],
													"ammount": 80
												}),
											};

											// $.ajax(settings).done(function(response) {
											// 	console.log(response);
											// });
										});

									}
									var url = "";
									var subtotal = $('#subtotal').val();
									var cp = $('#cpDestino').val();
									var ciudad = $('#ciudad').val();
									var colonia = $('#colonia').val();
									var calle = $('#calle').val();
									var idUsuario = $('#idUsuario').val();
									var precioEnvio = $("#costodeEnvio").val();
									var datos_paypal = JSON.stringify(details);

									var data = {
										'cp': cp,
										'ciudad': ciudad,
										'colonia': colonia,
										'calle': calle,
										'idUsuario': idUsuario,
										'datos_paypal': datos_paypal,
										'subtotal': subtotal,
										'precioEnvio': precioEnvio,
									}

									$.ajax({
										"url": "processarVenta.php",
										"method": "POST",
										"data": data,
										success: function(data) {
											var datos = JSON.parse(data);
											console.log(datos);
											if (datos.status) {
												Swal.fire({
													title: 'Transacción exitosa',
													text: 'Transacción completada por: ' + details.payer.name.given_name + '!',
													icon: 'success',
													confirmButtonColor: '#3085d6',
													confirmButtonText: 'Ok'
												}).then((result) => {
													if (result.isConfirmed) {
														window.location.href = "/cyc/confirmarpedido";
													}
												});
											} else {
												Swal.fire({
													title: 'Pedido sin realizar',
													text: 'El pedido no se realizó.',
													icon: 'error',
													confirmButtonColor: '#da4536',
													confirmButtonText: 'Ok'
												}).then((result) => {
													if (result.isConfirmed) {
														window.location.href = "/cyc/checkout";
													}
												});
											}
										}
									});
								});
							}


						}).render('#paypal-button-container');



					}).always(function() {
						setTimeout(() => {
							$('.cart-collaterals').waitMe('hide');
						}, 1500);
					});;
				});
			}).always(function() {
				setTimeout(() => {
					$('#myForm').waitMe('hide');
				}, 1500);
			});
		});
	})
</script>
<!-- Peticion a Debox -->
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>