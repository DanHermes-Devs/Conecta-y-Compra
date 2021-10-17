<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
	$error = false;
	
	
	require_once 'include/header.php';
?>
    <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px;">
		   
		   <div class="container" style="padding-top:50px;">

<div class="col-md-12" style="text-align:justify;">
        
        	<div class="form-group">
            	<h2 class="h2form" style="padding:20px;">TIENDAS DE CONVENIENCIA</h2>


<p>Plataforma: ComproPago<br><br>

	<a href="https://compropago.com/" target="_blank">https://compropago.com/</a><br><br>

Comisiones:<br><br>
•	Efectivo. 2.9% + $3.00 por transacción más IVA<br>
o	Comisión única en todos los puntos de cobro<br>
•	SPEI. 1.5% + $8.00 más IVA por transacción.<br>
•	Sin comisión inicial, sin renta mensual ni costos de instalación.<br>
•	Sin costo por transferencia.<br><br>
¿Cuánto costaría?<br><br>
Ejemplo. Si alguien compra un producto de $1,000 pesos.<br><br>
1)	En efectivo:<br>
•	Selecciona el producto: $1,000 pesos<br>
•	Se le suma el costo del envío: $1,200 pesos (en el caso que sean 200 pesos)<br>
•	Se le genera orden de compra por: $1,200 + $34.8 (2.9%) + $3.00 + $6.048 (iva de $34.8+$3.0) = $1,243.85<br><br>
2)	SPEI<br>
•	Selecciona el producto: $1,000 pesos<br>
•	Se le suma el costo del envío: $1,200 pesos (en el caso que sean 200 pesos)<br>
•	Se le genera orden de compra por: $1,200 + $18.0 (1.5%) + $8.00 + $4.16 (iva de $18+$8.0) = $1,230.16<br><br>
	
	Método de Pago a través de ComproPago<br><br>
Para hacer tu compra, puedes hacerlo utilizando los siguientes métodos de pago utilizando la plataforma ComproPago.<br>
La plataforma también está accesible a través dispositivos móviles.<br><br>

SPEI – transferencia electrónica<br>
•	Transferencia inmediata.<br>
•	Confirmación de pago inmediata.<br><br>
Pago en Efectivo<br>
•	Más de 31,000 establecimientos para recibir pagos en efectivo (bancos, tiendas de conveniencia, departamentales, farmacias, entro otros).<br>
•	Los establecimientos donde se pueden hacer pagos son:<br><br>
o	Tiendas de conveniencia:<br>
	7eleven – se cobra en caja una comisión de $9.00 por el concepto de recepción de cobranza.<br>
	Oxxo<br>
	Extra - se cobra en caja una comisión de $8.00 por el concepto de recepción de cobranza.<br>
	Del Sol<br>
o	Farmacias<br>
	Farmacias del Ahorro<br>
	Benavides<br>
	Farmacias Guadalajara<br>
	Esquivar<br>
	ABC<br>
o	Supermercados<br>
	La Comer<br>
	Citymarket<br>
	Sumesa<br>
	Ley<br>
	Fresko<br>
o	Tiendas departamentales<br>
	Banco Azteca<br>
	Coppel<br>
	Woolworth<br>
o	Bancos<br>
	Citibanamex<br>
	BBVA Bancomer<br>
	Scotiabank<br>
	Inbursa<br>
o	Otros<br>
	Telecomm Telégrafos - se cobra en caja una comisión de $15.00 por el concepto de recepción de cobranza.<br><br>

Instrucciones para hacer pagos<br>
1.	Dentro del micrositio que quieras comprar, selecciona el producto deseado.<br>
2.	Llena los datos de dirección y envío del producto.<br>
3.	Selecciona ComproPago como método de Pago<br>
4.	Se despliega una pantalla en la cual se debe seleccionar el método que se quiere usar:<br>
a.	Efectivo<br>
b.	SPEI<br><br>

1.	Al seleccionar efectivo, se despliega una lista de sucursales en las cuales se puede realizar el pago, después se genera la orden de pago.<br>
2.	Una vez seleccionado el establecimiento, se crea una orden de pago, en la cual se muestras las instrucciones para realizarlo.<br>
a.	Fecha límite de pago<br>
b.	Instrucciones para hacer el depósito:<br>
i.	Cantidad a depositar<br>
ii.	Convenio<br>
iii.	Referencia<br>
c.	Es posible recibir las instrucciones de pago a tu celular vía SMS o si prefieres imprimirlas.<br>
3.	Se realiza el pago en el establecimiento seleccionado.<br>
4.	Una vez aplicado el pago, se aprueba y se notifica a Conecta y Compra y al Vendedor<br><br>

b.	SPEI<br><br>

1.	Al seleccionar SPEI, se despliega una orden de pago en la cual se muestran las instrucciones para realizar el pago.<br>
a.	Fecha límite de pago<br>
b.	Datos necesarios para realizar la transferencia electrónica:<br>
i.	Cantidad a depositar<br>
ii.	Cuenta CLABE<br>
iii.	Banco Destino<br>
iv.	Beneficiario<br>
c.	Es posible recibir las instrucciones de pago a tu celular vía SMS o si prefieres imprimirlas.<br>
2.	Se realiza el pago en el establecimiento seleccionado.<br>
3.	Una vez realizada la transferencia, se aprueba el pago y se notifica a Conecta y Compra y al Vendedor<br><br>

Seguridad<br>
Esta plataforma usa SSL en todas sus operaciones. SSL es un protocolo diseñado para permitir que las aplicaciones transmitan información de manera segura.<br>
SSL cifra toda la información que se intercambia entre un servidor web y sus clientes, como los datos personales, mediante una clave de sesión única.<br>
Las transferencias que se realizan a través de la plataforma se procesan con total seguridad vía SPEI usando la CLABE de la cuenta bancaria que designes, para más información visita la sección de Transferencias.<br><br>

</p>	


            </div>
	
	<center><img src="http://digitaltryout.com/cyc/img/logo_cyc.png" style="max-width:100%;"></center>
        
        </div>

</div>
	   
           
	</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>