<?php
// Incluimos la conexion a la DB
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el o los querys
$query_orden  = "SELECT p.`id_pedido`, p.`referencia_cobro`, p.`id_transaccion_paypal`, DATE_FORMAT(p.`fecha`, '%d/%m/%Y') as fecha, p.`monto`, p.`status`, p.`costo_envio` FROM `pedidos` p "; 

// Consultar la BD
$resultado_orden  = mysqli_query($db, $query_orden); // Consulta para las usuarios

while ($rows = mysqli_fetch_array($resultado_orden)) {
    echo $rows['id_pedido'];
    echo $rows['referencia_cobro'];
    echo $rows['id_transaccion_paypal'];
    echo $rows['fecha'];
    echo $rows['monto'];
    echo $rows['status'];
    echo $rows['costo_envio'];
}