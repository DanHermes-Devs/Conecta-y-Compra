<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>

<style>
.container.mmac {
				padding-top:50px;
				}
@media(max-width:800px){
		.container.mmac {
			padding-top: 0px;
		}
		.btn-primary {
			max-width: 100%;
		}
		.scrolltable {
			width: 115%;
			overflow-x: scroll;
		}
	}
</style>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container mmac">

<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">TARIFAS</h2>

				
<p style="font-weight:bold;">1) Tarifas servicio terrestre (2 a 5 días de entrega) </p>
<p>Costo por rango de kilos, independientemente del destino.</p>
				
				<div class="scrolltable">
				<table width="200" border="1">
					<center><p>Servicio Terrestre (2 a 5 días de entrega)</p></center>
					<tbody>
						<tr>
						  <td><p style="font-weight:bold;">Peso</p></td>
						  <td><p style="font-weight:bold;">Zona 1</p></td>
						  <td><p style="font-weight:bold;">Zona 2</p></td>
						  <td><p style="font-weight:bold;">Zona 3</p></td>
						  <td><p style="font-weight:bold;">Zona 4</p></td>
						</tr>
						<tr>
						  <td>Hasta 5 KG</td>
						  <td>$  112.14</td>
						  <td>$  112.14</td>
						  <td>$  112.14</td>
						  <td>$  112.14</td>
						</tr>
						<tr>	 
						  <td>Hasta 20 KG</td>
						  <td>$  154.34</td>
						  <td>$  154.34</td>
						  <td>$  154.34</td>
						  <td>$  154.34</td>
						</tr>
						<tr>	 
						  <td>Hasta 35 KG</td>
						  <td>$  206.20</td>
						  <td>$  206.20</td>
						  <td>$  206.20</td>
						  <td>$  206.20</td>
						</tr>
						<tr>
						  <td>Hasta 60 KG</td>
						  <td>$  301.46</td>
						  <td>$  301.46</td>
						  <td>$  301.46</td>
						  <td>$  301.46</td>
						</tr>
						<tr>
						  <td>Seguro</td>
						  <td>2% adicional basado en el valor factura</td>
						</tr>
					</tbody>
				</table>
				</div>
				<br><br>
				
			<p style="font-weight:bold;">2)	Tarifas Servicio día siguiente  </p>			
			<div class="scrolltable">			
			<table width="200" border="1">
				<center><p>Servicio Día Siguiente</p></center>
			  <tbody>
				<tr>
				  <td>Hasta 1 KG</td>
				  <td>$  196.55</td>
				  <td>$  196.55</td>
				  <td>$  196.55</td>
				  <td>$  196.55</td>
				</tr>
				<tr>
				  <td>Kilo Adicional (por cada Kilo)</td>
				  <td>$   32.56</td>
				  <td>$   32.56</td>
				  <td>$   56.67</td>
				  <td>$   66.32</td>
				</tr>
				<tr>
				  <td>Seguro</td>
				  <td>2% adicional basado en el valor factura</td>
				</tr>
			  </tbody>
			</table>
			</div>
				<br><br>
				
<p style="font-weight:bold;">Condiciones de tarifa:  </p>	
				
				<p>•	Las tarifas indicadas incluyen IVA.<br>
•	No incluyen Seguro.<br>
•	Se aplicará la tarifa de acuerdo a peso y/o volumen.<br>
•	Expresadas en pesos mexicanos.<br>
•	En caso de requerirlo, el precio incluye la recolección en el domicilio del remitente*.<br>
o	Para solicitar la recolección, se debe imprimir la guía, pegarla al paquete y hablar a los siguientes teléfonos para solicitar la recolección: <br><br>
					
	Interior de la república 01800-013-3333<br>
	Ciudad de México y Área Metropolitana 55 3682-4040<br><br>
					
	*Recomendamos validar a través del Código Postal si tenemos cobertura.<br>
					
•	En caso de querer enviar o recibir paquetes en las sucursales de Redpack, a continuación se indican las direcciones: <br><br>
					
		Seguro de envío<br><br>
					
Condiciones del seguro del envío:<br>
•	Solo aplica durante el proceso de envío en la mensajería, desde la recolección hasta la entrega.<br>
•	Se debe contar con el valor factura del producto. <br>
•	El costo del seguro es el 2% del valor de la factura, el cual debe sumarse al costo del envío.<br>
•	En caso de robo o pérdida durante el proceso de envío, es necesario contar con la factura original del producto para que proceda la reclamación.<br>
•	Aplica un deducible del 25% del valor factura.<br><br>

Zonas de cobertura<br><br>
					
•	Se despliegan una vez introducido el código postal.<br>
•	Antes de solicitar el envío, favor de verificar si tenemos cobertura a su Código Postal introduciéndolo en el siguiente campo:<br><br>

Artículos Prohibidos<br><br>
A continuación se enlistan los artículos que no es posible enviar a través de nuestro servicio:<br>
•	Bebidas alcohólicas<br>
•	Armas<br>
•	Alimentos<br>
•	Pieles exóticas<br>
•	Muestras de laboratorio<br>
•	Semillas<br>
•	Pornografía<br>
•	Drogas<br>
•	Valores<br>
•	Obras de arte<br>
•	Aerosoles<br>
•	Plantas<br>
•	Animales<br>
•	Restos Humanos<br>
•	Juegos de Azar<br>
•	Explosivos<br><br>

Contacto<br><br>
					
Si tienes dudas sobre los envíos y nos quieres contactar, escríbenos al Chat o al correo electrónico de Atención al cliente de Conecta y Compra para que te ayudemos. <br>
Teléfonos de atención para atender dudas sobre los envíos:<br><br>
	Interior de la república 01800-013-3333
	Ciudad de México y Área Metropolitana 55 3682-4040<br><br>

Para mayor información, visitar el siguiente enlace: <br><br>
<a href="http://csr.redpack.com.mx:8080/redpack/Herramientas?opcion=3">http://csr.redpack.com.mx:8080/redpack/Herramientas?opcion=3</a>
			



</p>


				
								<center><br>
	            <a style="width: 300px;" class="btn btn-block btn-primary" name="btn-signup" href="https://digitaltryout.com/cyc/login.php">
				<h2 style="font-size: 20px;margin-top: 10px;margin-bottom: 10px;"><b>Regístrate</b></h2>
				</a><br>
	            </center>
				
				
				<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>













            </div>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>