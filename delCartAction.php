<?php
ob_start();
session_start();
if( !isset($_SESSION['cartuser'])){}
include_once 'include/dbconnect.php';
$uidcart=$_SESSION['cartuser'];
$error = false;


if($_POST){
    $arrCarrito = array();
    $cantCarrito = 0;
    $option = $_POST['op'];
    $idProducto = openssl_decrypt($_POST['dataId'], "AES-128-ECB", "conectaycompra");

    if(is_numeric($idProducto)){
        $arrCarrito = $_SESSION['arrCarrito'];
        for($pr = 0; $pr < count($arrCarrito); $pr++){
            if($arrCarrito[$pr]['id_producto'] == $idProducto){
                unset($arrCarrito[$pr]);
            }
        }
        
        sort($arrCarrito);
        $_SESSION['arrCarrito'] = $arrCarrito;
        foreach($_SESSION['arrCarrito'] as $prod){
            $cantCarrito += $prod['cantidad'];
        }

        $respuesta = array("status" => true, "cantCarrito" => $cantCarrito);

    } else {
        $respuesta = array("status" => false, "msg" => "No se eliminó del carrito.");
    }
}

echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);