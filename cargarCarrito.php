<?php

$arrCarrito = array();
$cantCarrito = 0;
$idProdEncrypt = openssl_encrypt($producto, "AES-128-ECB", "conectaycompra");
			
if(is_numeric($producto) and is_numeric($cantidad)){

	$selectProduct = "SELECT p.`id_producto`, p.`nombre`, p.`descripcion`, p.`id_categoria`, p.`img1`, c.`nombre_cat` as 'categoria', p.`precio2`, p.`stock` 
	FROM productos p 
	INNER JOIN categorias c ON p.`id_categoria`=c.`id` 
	WHERE p.`activo` != 0 AND p.`id_producto` = '$producto'";
	
	$ejecutar = mysqli_query($conn, $selectProduct);
	

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