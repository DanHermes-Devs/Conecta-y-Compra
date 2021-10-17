<?php

ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}

require_once 'dbconnect.php';


$nombre = $_POST["nombre"];
$email = $_POST["email"];
$suscripcion = $_POST["suscripcion"];

$ruta = "http://digitaltryout.com/cyc/";

if (isset($suscripcion) && $suscripcion === "ok") {

    $valorSuscripcion = 500;

    $fecha = new DateTime(date("c"));

    $fecha->modify('+24 hours');

    $fecha = $fecha->format('Y-m-d') . "T" . $fecha->format('H:i:s') . "Z";

    // Crear el access token
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


        $curl2 = curl_init();

        // Crear el producto

        curl_setopt_array($curl2, array(
            CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/catalogs/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "name": "Conecta y Compra",
            "description": "Plan Basico",
            "type": "DIGITAL",
            "category": "ECOMMERCE_SERVICES",
            "image_url": "http://digitaltryout.com/cyc/img/logo_cyc.png",
            "home_url": "http://digitaltryout.com/cyc/index.php"
          }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl2);
        $err2 = curl_error($curl);

        curl_close($curl2);

        if ($err2) {

            echo "cURL Error #:" . $err2;
        } else {

            $respuesta2 = json_decode($response, true);

            $id_producto =  $respuesta2["id"];

            // Crear el plan de pagos

            $curl3 = curl_init();

            curl_setopt_array($curl3, array(
                CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/billing/plans',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 300,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "product_id": "' . $id_producto . '",
                    "name": "Suscripción Mensual a Conecta y Compra",
                    "description": "Plan de pago mensual a Conecta y Compra",
                    "status": "ACTIVE",
                    "billing_cycles": [
                        {
                            "frequency": {
                                "interval_unit": "MONTH",
                                "interval_count": 1
                            },
                            "tenure_type": "REGULAR",
                            "sequence": 1,
                            "total_cycles": 99,
                            "pricing_scheme": {
                                "fixed_price": {
                                    "value": "500",
                                    "currency_code": "MXN"
                                }
                            }
                        }
                    ],
                    "payment_preferences": {
                        "auto_bill_outstanding": true,
                        "setup_fee": {
                            "value": "500",
                            "currency_code": "MXN"
                        },
                        "setup_fee_failure_action": "CONTINUE",
                        "payment_failure_threshold": 3
                    },
                    "taxes": {
                        "percentage": "0",
                        "inclusive": false
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = curl_exec($curl3);
            $err3 = curl_error($curl3);

            curl_close($curl3);

            if ($err3) {

                echo "cURL Error #:" . $err3;
            } else {

                $respuesta3 = json_decode($response, true);

                $id_plan =  $respuesta3["id"];

                $curl4 = curl_init();

                curl_setopt_array($curl4, array(
                    CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 300,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => '{
                    "plan_id": "' . $id_plan . '",
                    "start_time": "' . $fecha . '",
                    "subscriber": {
                        "name": {
                        "given_name": "' . $nombre . '"
                        },
                        "email_address": "' . $email . '"
                    },
                        "auto_renewal": true,
                        "application_context": {
                            "brand_name": "Conecta y Compra",
                            "locale": "en-US",
                            "shipping_preference": "SET_PROVIDED_ADDRESS",
                            "user_action": "SUBSCRIBE_NOW",
                            "payment_method": {
                            "payer_selected": "PAYPAL",
                            "payee_preferred": "IMMEDIATE_PAYMENT_REQUIRED"
                            },
                            "return_url": "http://digitaltryout.com/cyc/descarga-contratos.php",
                            "cancel_url": "http://digitaltryout.com/cyc/contrato-servicio-cyc"
                        }
                    }
                    ',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token
                    ),
                ));

                $response = curl_exec($curl4);
                $err4 = curl_error($curl4);

                curl_close($curl3);

                if ($err4) {

                    echo "cURL Error #:" . $err4;
                } else {

                    curl_close($curl4);

                    $respuesta4 = json_decode($response, true);
                    $urlPaypal = $respuesta4["links"][0]["href"];

                    echo $urlPaypal;
                }
            }
        }
    }
}
