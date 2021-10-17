<?php

include_once '../dbconnect.php';

$sql = "SELECT usuarios.*, tiendas.* FROM tiendas INNER JOIN usuarios ON (usuarios.id_usuario=tiendas.id_usuario)";
$res = mysqli_query($mysqli, $sql);

$data = array();
while( $rows = mysqli_fetch_assoc($res) ) {
    $data[] = $rows;
}


echo json_encode($data);