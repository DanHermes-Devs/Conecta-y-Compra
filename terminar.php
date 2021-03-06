<?php
	ob_start();
	session_start();
	if( !isset($_SESSION['user'])){
	}
	$uid=$_SESSION['user'];
	include_once 'dbconnect.php';

	require_once 'include/header.php';
?>
<link href="http://fusionat.com.mx/tienda/wp-content/themes/wooclean/style.css?ver=4.9.7" rel="stylesheet">
<style>
.order_review table{min-width:100%;}
.shop_table{max-width:100%; min-width:100%;}
.shop_table td {
    border-top: 1px solid #e6e6e6;
    padding: 36px 10px;
    vertical-align: middle;
}
.woocommerce-checkout .woocommerce-checkout-payment .form-row .button {
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
border:none;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
	font-family: "Open sans", sans-serif;
	font-weight: 500;
	line-height: 1.1;
	color: inherit;
}

body *{font-family: "Open sans", sans-serif;}

label {
	font-size: 16px;
	width: 100%;
	color: #b2b2b2;
	margin-bottom: 10px;
	font-weight: normal;
	letter-spacing: 1px;
}

@media(max-width:800px){
.container.pagecont {
	margin-top: 50px !important;
}
.h1cuenta {
	font-size: 22px;

}	
table {
	width: 100%;
	min-width: 100%;
}
.pagecont .container {
	padding-top: 0 !important;
	padding: 0 5%;
	margin: 0;
}
.container.pagecont {
	margin-top: 50px !important;
	margin-bottom: 40px;
}
.col-md-6 {
	width: 100%;
	margin-bottom: 30px;
}

.checkout button, .checkout input, .checkout optgroup, .checkout select, .checkout textarea {
	margin: 0;
	font: inherit;
	color: inherit;
	width: 100%;
	height: 35px;
	border-radius: 5px;
	border: 1px solid #ccc;
}
input[type="checkbox"], input[type="radio"] {
	width: auto !important;
}
li{list-style:none;}
}

</style>

   <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; margin-top:100px;">
		   
		   <div class="container checkout">

		   <h1 class="h1cuenta">TERMINAR COMPRA</h1>

<div class="container">
			<div id="page-7" class="post-7 page type-page status-publish hentry">
			<div class="entry-content">
				<div class="woocommerce">
	<div class="woocommerce-info">??Ya eres cliente? <a href="#" class="showlogin">Haz clic aqu?? para acceder</a></div>
<form class="woocommerce-form woocommerce-form-login login" method="post" style="display:none;">

	
	<p>Si ya eres cliente, por favor, rellena tus datos a continuaci??n. Si eres un nuevo cliente, contin??a al formulario de facturaci??n y  env??o.</p>

	<p class="form-row form-row-first">
		<label for="username">Nombre de usuario o correo electr??nico <span class="required">*</span></label>
		<input type="text" class="input-text" name="username" id="username">
	</p>
	<p class="form-row form-row-last">
		<label for="password">Contrase??a <span class="required">*</span></label>
		<input class="input-text" type="password" name="password" id="password">
	</p>
	<div class="clear"></div>

	
	<p class="form-row">
		<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="6437f22994"><input type="hidden" name="_wp_http_referer" value="/tienda/checkout/">		<button type="submit" class="button" name="login" value="Acceder">Acceder</button>
		<input type="hidden" name="redirect" value="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4TJ27525AE363564X&useraction=commit">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Recu??rdame</span>
		</label>
	</p>
	<p class="lost_password">
		<a href="">??Olvidaste la contrase??a?</a>
	</p>

	<div class="clear"></div>

	
</form>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4TJ27525AE363564X&useraction=commit" enctype="multipart/form-data" novalidate="novalidate">

	
		
		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<div class="woocommerce-billing-fields">
	
		<h3>Detalles de facturaci??n</h3>

	
	
	<div class="woocommerce-billing-fields__field-wrapper">
			<p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10"><label for="billing_first_name" class="">Nombre <abbr class="required" title="obligatorio">*</abbr></label><input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" autofocus="autofocus"></p><p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20"><label for="billing_last_name" class="">Apellidos <abbr class="required" title="obligatorio">*</abbr></label><input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name"></p><p class="form-row form-row-wide" id="billing_company_field" data-priority="30"><label for="billing_company" class="">Nombre de la empresa</label><input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization"></p><p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40"><label for="billing_country" class="">Pa??s <abbr class="required" title="obligatorio">*</abbr></label><select name="billing_country" id="billing_country" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true"><option value="">Elige un pa??s???</option><option value="AF">Afganist??n</option><option value="AL">Albania</option><option value="DE">Alemania</option><option value="DZ">Algeria</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AG">Antigua y Barbuda</option><option value="AQ">Ant??rtida</option><option value="SA">Arabia Saudita</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="PW">Belau</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BY">Bielorrusia</option><option value="MM">Birmania</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, San Eustaquio y Saba</option><option value="BA">Bosnia y Herzegovina</option><option value="BW">Botswana</option><option value="BR">Brasil</option><option value="BN">Brun??i</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="BE">B??lgica</option><option value="CV">Cabo Verde</option><option value="KH">Camboya</option><option value="CM">Camer??n</option><option value="CA">Canad??</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CY">Chipre</option><option value="VA">Ciudad del Vaticano</option><option value="CO">Colombia</option><option value="KM">Comoras</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="KP">Corea del Norte</option><option value="KR">Corea del Sur</option><option value="CR">Costa Rica</option><option value="CI">Costa de Marfil</option><option value="HR">Croacia</option><option value="CU">Cuba</option><option value="CW">Cura??ao</option><option value="DK">Dinamarca</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="EC">Ecuador</option><option value="EG">Egipto</option><option value="SV">El Salvador</option><option value="AE">Emiratos ??rabes Unidos</option><option value="ER">Eritrea</option><option value="SK">Eslovaquia</option><option value="SI">Eslovenia</option><option value="ES">Espa??a</option><option value="US">Estados Unidos (EEUU)</option><option value="EE">Estonia</option><option value="ET">Etiop??a</option><option value="PH">Filipinas</option><option value="FI">Finlandia</option><option value="FJ">Fiyi</option><option value="FR">Francia</option><option value="GA">Gab??n</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GD">Granada</option><option value="GR">Grecia</option><option value="GL">Groenlandia</option><option value="GP">Guadalupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GF">Guayana Francesa</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GQ">Guinea Ecuatorial</option><option value="GW">Guinea-Bis??u</option><option value="GY">Guyana</option><option value="HT">Hait??</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungr??a</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Irak</option><option value="IE">Irlanda</option><option value="IR">Ir??n</option><option value="BV">Isla Bouvet</option><option value="NF">Isla Norfolk</option><option value="SH">Isla Santa Elena</option><option value="IM">Isla de Man</option><option value="CX">Isla de Navidad</option><option value="IS">Islandia</option><option value="AX">Islas ??land</option><option value="KY">Islas Caim??n</option><option value="CC">Islas Cocos</option><option value="CK">Islas Cook</option><option value="FO">Islas Feroe</option><option value="GS">Islas Georgias y Sandwich del Sur</option><option value="HM">Islas Heard y McDonald</option><option value="FK">Islas Malvinas</option><option value="MP">Islas Marianas del Norte</option><option value="MH">Islas Marshall</option><option value="SB">Islas Salom??n</option><option value="TC">Islas Turcas y Caicos</option><option value="VG">Islas V??rgenes Brit??nicas</option><option value="VI">Islas V??rgenes de Estados Unidos (EEUU)</option><option value="UM">Islas de ultramar menores de Estados Unidos (EEUU)</option><option value="IL">Israel</option><option value="IT">Italia</option><option value="JM">Jamaica</option><option value="JP">Jap??n</option><option value="JE">Jersey</option><option value="JO">Jordania</option><option value="KZ">Kazajist??n</option><option value="KE">Kenia</option><option value="KG">Kirguist??n</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="LA">Laos</option><option value="LS">Lesoto</option><option value="LV">Letonia</option><option value="LR">Liberia</option><option value="LY">Libia</option><option value="LI">Liechtenstein</option><option value="LT">Lituania</option><option value="LU">Luxemburgo</option><option value="LB">L??bano</option><option value="MO">Macao</option><option value="MG">Madagascar</option><option value="MY">Malasia</option><option value="MW">Malaui</option><option value="MV">Maldivas</option><option value="MT">Malta</option><option value="ML">Mal??</option><option value="MA">Marruecos</option><option value="MQ">Martinica</option><option value="MU">Mauricio</option><option value="MR">Mauritania</option><option value="YT">Mayotte</option><option value="FM">Micronesia</option><option value="MD">Moldavia</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MZ">Mozambique</option><option value="MX" selected="selected">M??xico</option><option value="MC">M??naco</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NI">Nicaragua</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NO">Noruega</option><option value="NC">Nueva Caledonia</option><option value="NZ">Nueva Zelanda</option><option value="NE">N??ger</option><option value="OM">Om??n</option><option value="PK">Pakist??n</option><option value="PA">Panam??</option><option value="PG">Pap??a Nueva Guinea</option><option value="PY">Paraguay</option><option value="NL">Pa??ses Bajos</option><option value="PE">Per??</option><option value="PN">Pitcairn</option><option value="PF">Polinesia Francesa</option><option value="PL">Polonia</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="GB">Reino Unido (UK)</option><option value="CF">Rep??blica Centroafricana</option><option value="CZ">Rep??blica Checa</option><option value="DO">Rep??blica Dominicana</option><option value="MK">Rep??blica de Macedonia</option><option value="RE">Reuni??n</option><option value="RW">Ruanda</option><option value="RO">Rumania</option><option value="RU">Rusia</option><option value="EH">Sahara Occidental</option><option value="WS">Samoa</option><option value="AS">Samoa Americana</option><option value="BL">San Bartolom??</option><option value="KN">San Crist??bal y Nieves</option><option value="SM">San Marino</option><option value="MF">San Mart??n (parte de Francia)</option><option value="SX">San Mart??n (parte de Holanda)</option><option value="PM">San Pedro y Miquel??n</option><option value="VC">San Vicente y las Granadinas</option><option value="LC">Santa Luc??a</option><option value="ST">Santo Tom?? y Pr??ncipe</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leona</option><option value="SG">Singapur</option><option value="SY">Siria</option><option value="SO">Somalia</option><option value="LK">Sri Lanka</option><option value="SZ">Suazilandia</option><option value="ZA">Sud??frica</option><option value="SD">Sud??n</option><option value="SS">Sud??n del Sur</option><option value="SE">Suecia</option><option value="CH">Suiza</option><option value="SR">Surinam</option><option value="SJ">Svalbard y Jan Mayen</option><option value="TH">Tailandia</option><option value="TW">Taiw??n</option><option value="TZ">Tanzania</option><option value="TJ">Tayikist??n</option><option value="IO">Territorio Brit??nico del Oc??ano ??ndico</option><option value="TF">Territorios Franc??ses del Sur</option><option value="PS">Territorios Palestinos</option><option value="TL">Timor Oriental</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad y Tobago</option><option value="TM">Turkmenist??n</option><option value="TR">Turqu??a</option><option value="TV">Tuvalu</option><option value="TN">T??nez</option><option value="UA">Ucrania</option><option value="UG">Uganda</option><option value="UY">Uruguay</option><option value="UZ">Uzbekist??n</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis y Futuna</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabue</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_country-container" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="M??xico">M??xico</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Actualizar pa??s">Actualizar pa??s</button></noscript></p><p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Direcci??n de la calle <abbr class="required" title="obligatorio">*</abbr></label><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="N??mero de la casa y nombre de la calle" value="" autocomplete="address-line1"></p><p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartamento, habitaci??n, etc. (opcional)" value="" autocomplete="address-line2"></p><p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Localidad / Ciudad <abbr class="required" title="obligatorio">*</abbr></label><input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2"></p><p class="form-row form-row-wide address-field validate-state woocommerce-validated" id="billing_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-state woocommerce-validated"><label for="billing_state" class="">Regi??n / Provincia</label><select name="billing_state" id="billing_state" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="" tabindex="-1" aria-hidden="true"><option value="">Elige una opci??n???</option><option value="DF">Ciudad de M??xico</option><option value="JA">Jalisco</option><option value="NL">Nuevo Le??n</option><option value="AG">Aguascalientes</option><option value="BC">Baja California</option><option value="BS">Baja California Sur</option><option value="CM">Campeche</option><option value="CS">Chiapas</option><option value="CH">Chihuahua</option><option value="CO">Coahuila</option><option value="CL">Colima</option><option value="DG">Durango</option><option value="GT">Guanajuato</option><option value="GR">Guerrero</option><option value="HG">Hidalgo</option><option value="MX">Estado de M??xico</option><option value="MI">Michoac??n</option><option value="MO">Morelos</option><option value="NA">Nayarit</option><option value="OA">Oaxaca</option><option value="PU">Puebla</option><option value="QT">Quer??taro</option><option value="QR">Quintana Roo</option><option value="SL">San Luis Potos??</option><option value="SI">Sinaloa</option><option value="SO">Sonora</option><option value="TB">Tabasco</option><option value="TM">Tamaulipas</option><option value="TL">Tlaxcala</option><option value="VE">Veracruz</option><option value="YU">Yucat??n</option><option value="ZA">Zacatecas</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_state-container" role="combobox"><span class="select2-selection__rendered" id="select2-billing_state-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></p><p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode"><label for="billing_postcode" class="">C??digo postal <abbr class="required" title="obligatorio">*</abbr></label><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code"></p><p class="form-row form-row-wide validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone" class="">Tel??fono</label><input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel"></p><p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110"><label for="billing_email" class="">Correo electr??nico <abbr class="required" title="obligatorio">*</abbr></label><input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username"></p></div>

	</div>

			</div>

			
		</div>

		
	
	
	<div id="order_review" class="woocommerce-checkout-review-order">
		<h3 id="order_review_heading">Tu orden</h3>
		<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name hidden">Producto</th>
			<th class="product-total">Total</th>
		</tr>
	</thead>
	<tbody>
							<tr class="cart_item">
						<td class="product-name">
														 <strong class="product-quantity"></strong>													</td>
						<td class="product-total">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,170.00</span>						</td>
					</tr>
						</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th>Subtotal</th>
			<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>8,200.00</span></td>
		</tr>

		
		
			
			<tr class="shipping">
	<th>Env??o</th>
	<td data-title="Env??o">
					Cuota Fija: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>80.00</span> <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="flat_rate:1" class="shipping_method">		
		
			</td>
</tr>

	
									
		
		<tr class="order-total">
			<th>Total</th>
			<td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>8,280.00</span></strong> </td>
		</tr>

		
	</tfoot>
</table>

<div id="payment" class="woocommerce-checkout-payment">
			<ul class="wc_payment_methods payment_methods methods">
			<li class="wc_payment_method payment_method_bacs">
	<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">

	<label for="payment_method_bacs">
		Transferencia bancaria directa 	</label>
			<div class="payment_box payment_method_bacs">
			<p>Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa la referencia del pedido como referencia de pago. Tu pedido no ser?? enviado hasta que el importe haya sido recibido en nuestra cuenta.</p>
		</div>
	</li>
<li class="wc_payment_method payment_method_ppec_paypal">
	<input id="payment_method_ppec_paypal" type="radio" class="input-radio" name="payment_method" value="ppec_paypal" data-order_button_text="Seguir con el pago">

	<label for="payment_method_ppec_paypal">
		PayPal Express Checkout <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="PayPal Express Checkout">	</label>
			<div class="payment_box payment_method_ppec_paypal" style="display:none;">
			<p>Pago a trav??s de PayPal; puedes pagar con tu tarjeta incluso si no tienes una cuenta de PayPal.</p>
		</div>
	</li>
		</ul>
		<div class="form-row place-order">
		<noscript>
			Debido a que tu navegador no soporta JavaScript o lo tiene deshabilitado, aseg??rate por favor de hacer clic en el bot??n &lt;em&gt;Actualizar totales&lt;/em&gt; antes de realizar el pedido. De no hacerlo, se te podr??a cobrar m??s de la cantidad indicada arriba.			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Actualizar totales">Actualizar totales</button>
		</noscript>

		
		
		<a href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4TJ27525AE363564X&useraction=commit"><button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Realizar el pedido" data-value="Realizar el pedido">Realizar el pedido</button></a>
		
		<input type="hidden" id="_wpnonce" name="_wpnonce" value="85ae3afd93"><input type="hidden" name="_wp_http_referer" value="/tienda/?wc-ajax=update_order_review">	</div>
</div>

	</div>

	
</form>

</div>
			</div> <!-- End .entry-content -->
		</div>
	</div>
</div>

</div>
	
<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>