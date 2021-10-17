<?php

ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}
include_once 'dbconnect.php';

require_once 'include/header.php';



?>

<style>
    .flex {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .mt-4{
        margin-top: 1.5rem;
    }
</style>

<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">
    <h1 class="h1cuenta" style="color: #db4537;">PUEDES DESCARGAR TUS CONTRATOS HACIENDO CLIC EN LOS BOTONES DE ABAJO</h1>
    <div class="flex">
        <a href="TCPDF-main/examples/contrato-cyc.php" class="btn btn-success" target="_blank">CONTRATO DE COMERCIALIZACION CONECTA Y COMPRA</a>
        <a href="TCPDF-main/examples/contrato-servicios-cyc.php" class="btn btn-warning mt-4" target="_blank">CONTRATO DE COMERCIALIZACION SERVICIOS CONECTA Y COMPRA</a>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>
</body>
<?php

if (isset($_GET["subscription_id"])) {

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/oauth2/token',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 300,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic QVhZSlZRaWJ1LVMzRmZUcUpNdmhldVdNMDFHSW9ZVXNLemZ0T3Jja0Z5RWNxWFJsWGljU2hzMmNVVlhIQjJjUHZRVmpBazZ3TmVSenRTRzY6RUJ5M0l4S2tSaWtPNW5YTERVLWtuRjVVT2dnQ3lBd2xFUWRlekFQQjgzUUk3bm9hSDAyZVU5STA1bDI1dFJyemRWVzdEaHRnX0JjNG4weHg=',
			'Content-Type: application/x-www-form-urlencoded'
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {

		$respuesta = json_decode($response, true);
		$token = $respuesta["access_token"];

		// Valida la suscripcion
		$curl2 = curl_init();

		curl_setopt_array($curl2, array(
			CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/' . $_GET["subscription_id"],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 300,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token
			),
		));

		$response = curl_exec($curl2);
		$err = curl_error($curl2);

		curl_close($curl2);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {

			$respuesta2 = json_decode($response, true);

			$estado = $respuesta2["status"];

			if ($estado == "ACTIVE") {

				$paypal = $respuesta2["subscriber"]["email_address"];
				$suscripcion = 1;
				$id_suscripcion = $_GET["subscription_id"];
				$ciclo_pago = 1;
				$fecha_inicial = substr($respuesta2["status_update_time"], 0, -10);
				$fecha_vencimiento = strtotime('+1 month', strtotime($fecha_inicial));
				$vencimiento = date("Y-m-d", $fecha_vencimiento);

				$id_usuario = $uid;
				$nombre = $_COOKIE["nombre"];
				$email = $_COOKIE["email"];
				$rfc = $_COOKIE["rfc"];
				$direccion = $_COOKIE["direccion"];
				$firma = $_COOKIE["firma"];


				$updateUsuario = "UPDATE usuarios SET paypal = '$paypal', suscripcion = '$suscripcion', id_suscripcion = '$id_suscripcion', ciclo_pago = '$ciclo_pago', vencimiento = '$vencimiento' WHERE usuarios.id_usuario = $uid;";
				$ejecutarSQL2 = mysqli_query($conn, $updateUsuario);

				$cons2 = "INSERT INTO contratoCYC (id_usuario, nombre_completo, rfc, direccion, firma) VALUES ($id_usuario, '$nombre', '$rfc', '$direccion', '$firma')";
				$ejecutarSQL2 = mysqli_query($conn, $cons2);
			}
		}
	}
}

?>
</html>
<?php ob_end_flush(); ?>