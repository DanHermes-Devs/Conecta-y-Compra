<?php
ob_start();
session_start();
if( !isset($_SESSION['cartuser'])){}
include_once 'include/dbconnect.php';
$uidcart=$_SESSION['cartuser'];
$error = false;


//Comprobamos que el valor no venga vacío
if(isset($_POST['funcion']) && !empty($_POST['funcion'])) {
    $funcion = $_POST['funcion'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        case 'funcion1': 
				$arrCarrito = array();
				$cantCarrito = 0;
				$idProdEncrypt = openssl_encrypt($producto, "AES-128-ECB", "conectaycompra");

				foreach($_SESSION['arrCarrito'] as $prod){
					sort($arrCarrito);
					$cantCarrito += $prod['cantidad'];
				}
				
				sort($arrCarrito);
				$respuesta = array("status" => true, "cantCarrito" => $cantCarrito, "carrito" => $_SESSION['arrCarrito']);
				echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
            break;
        case 'funcion2': 
            if ( isset($_POST['p']) ) {

                // clean user inputs to prevent sql injections
        
            $producto = trim($_POST['p']);
            $user = trim($_POST['u']);
            $tienda = trim($_POST['t']);
            $action = trim($_POST['a']);
            $cantidad = trim($_POST['qty']);
        
            if($cantidad<1){
                $cantidad = 1;
            }
        
                // basic name validation
            if (empty($producto)) {
                $error = true;
                $errMSG = "<div class='errormsg'>Ups, ocurrió un problema. Inténtalo de nuevo o recarga la página.</div>";
            }
        
        
                // if there's no error, continue to signup
            if( !$error ) {
                if($action == "a"){
                        // unset($_SESSION['arrCarrito']);exit;
                    $arrCarrito = array();
                    $cantCarrito = 0;
                    $idProdEncrypt = openssl_encrypt($producto, "AES-128-ECB", "conectaycompra");
                    
                    if(is_numeric($producto) and is_numeric($cantidad)){
        
                        $selectProduct = "SELECT p.`id_producto`, p.`nombre`, p.`descripcion`, p.`id_categoria`, p.`img1`, c.`nombre_cat` as 'categoria', p.`precio2`, p.`stock` 
                        FROM productos p 
                        INNER JOIN categorias c ON p.`id_categoria`=c.`id` 
                        WHERE p.`activo` != 0 AND p.`id_producto` = '$producto'";
                        
                        $ejecutar = mysqli_query($conn, $selectProduct);
                        
                        sort($arrCarrito);
                        while($row = mysqli_fetch_array($ejecutar)){
                            $arrProducto = array(
                                'id_producto' => $producto,
                                'id_producto_encrypt' => $idProdEncrypt,
                                'producto' => $row['nombre'],
                                'cantidad' => $cantidad,
                                'precio' => $row['precio2'],
                                'imagen' => $row['img1']
                            );
                            if(isset($_SESSION['arrCarrito'])) {
                                $on = true;
                                $arrCarrito = $_SESSION['arrCarrito'];
                                for($pr = 0; $pr < count($arrCarrito); $pr++){
                                    if($arrCarrito[$pr]['id_producto'] == $producto){
                                        $on = false;
                                    }
                                }
                                if($on){
                                    array_push($arrCarrito, $arrProducto);
                                }
                                sort($arrCarrito);
                                $_SESSION['arrCarrito'] = $arrCarrito;
                            } else {
                                sort($arrCarrito);
                                array_push($arrCarrito, $arrProducto);
                                $_SESSION['arrCarrito'] = $arrCarrito;
                            }
                            
                            foreach($_SESSION['arrCarrito'] as $prod){
                                sort($arrCarrito);
                                $cantCarrito += $prod['cantidad'];
                            }
                            
                            sort($arrCarrito);
                            $respuesta = array("status" => true, "cantCarrito" => $cantCarrito, "carrito" => $_SESSION['arrCarrito']);
                        }
                    }
        
                    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
                    
                    $query = "INSERT INTO cart (id_usuario, id_producto, id_tienda, cantidad, activo) VALUES ('$user', $producto, $tienda, $cantidad, 1)";
        
                    $res = mysqli_query($conn, $query);
                }
        
                if($action == "d"){
        
                    $query = "DELETE FROM cart WHERE id_usuario = '$user' AND id_producto = $producto";
        
                    $res = mysqli_query($conn, $query);
        
                }
        
            }
            echo $errMSG;
        }
            break;
    }
}



?>