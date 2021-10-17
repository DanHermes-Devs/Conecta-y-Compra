<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
}
$uid = $_SESSION['user'];
include_once 'dbconnect.php';
if($_POST){
    
    // $id_transaccion_paypal = NULL;
    // $datos_paypal = NULL;
    $idUsuario = $_SESSION['user'];
    $monto = 0;
    $cp = $_POST['cp'];
    $ciudad = $_POST['ciudad'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];

    $datosEnvio = $calle . ', ' . $colonia . ', ' . $ciudad . ', ' . $cp;
    $status = "PENDIENTE";
    $subtotal = $_POST['subtotal'];
    $precioEnvio = $_POST['precioEnvio'];

    if(!empty($_SESSION['cartuser'])){
        $monto = $subtotal + $precioEnvio;
        
        $monto2 = bcdiv($monto, '1', 2);
        if(empty($_POST['datos_paypal'])){

        }else {
            $jsonPay = $_POST['datos_paypal'];
            $objPay = json_decode($jsonPay);
            $status = "APROBADO";

            if(is_object($objPay)){
                $datos_paypal = $jsonPay;
                $id_transaccion_paypal = $objPay->purchase_units[0]->payments->captures[0]->id;
                if($objPay->status == "COMPLETED"){
                    $totalPaypal = $objPay->purchase_units[0]->amount->value;
                    if($monto == $totalPaypal){
                        $status = "Completo";
                        
                        $sql = "INSERT INTO `pedidos` (`id_transaccion_paypal`, `datos_paypal`, `fecha`, `monto`, `direccion_envio`, `status`, `id_usuario`, `costo_envio`) VALUES ('$id_transaccion_paypal', '$datos_paypal', CURRENT_TIMESTAMP, '$monto2', '$datosEnvio', '$status', '$idUsuario', '$precioEnvio')";

                        if($ejecutar = $conn->query($sql)){
                            if($ejecutar > 0){
                                $select = "SELECT id_pedido FROM pedidos ORDER BY id_pedido DESC LIMIT 1";
                                $ejecutarSelect = $conn->query($select);
                                $data = array();
                                while($row = mysqli_fetch_row($ejecutarSelect)){
                                    foreach($_SESSION['arrCarrito'] as $producto) {
                                        $productoid = $producto['id_producto'];
                                        $monto22 = bcdiv($producto["precio"], '1', 2);
                                        $precio = $monto22;
                                        $cantidad = $producto["cantidad"];
                                        $sql2 = "INSERT INTO `detalle_pedido` (`id_pedido`, `id_producto`, `precio`, `cantidad`) VALUES ($row[0], '$productoid', $precio, $cantidad)";
                                        $conn->query($sql2);
                                    }

                                    $orden = openssl_encrypt($row[0], "AES-128-ECB", "conectaycompra");
                                    $transaccion = openssl_encrypt($id_transaccion_paypal, "AES-128-ECB", "conectaycompra");
                                    $respuesta = array("status" => true, "orden" => $orden, "transaccion" => $transaccion, "msg" => 'Pedido realizado con éxito.');

                                    $_SESSION['dataorden'] = $respuesta;
                                    unset($_SESSION['arrCarrito']);
                                }
                            }


                        } else {
                            $respuesta = array("status" => false, "msg" => 'No es posible procesar el pedido 1');
                        }
                    }
                }else {
                    $respuesta = array("status" => false, "msg" => 'No es posible completar el pago con paypal');
                }
            }else {
                $respuesta = array("status" => false, "msg" => 'Hubo un error en la transacción');
            }
        }
    } else {
        $respuesta = array("status" => false, "msg" => 'No es posible procesar el pedido 2');
    }
    
} else {
    $respuesta = array("status" => false, "msg" => 'No es posible procesar el pedido 3');
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);