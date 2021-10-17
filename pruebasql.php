<?php

ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}

include 'dbconnect.php';

$sql = "SELECT contratoCYC.*, usuarios.* 
FROM contratoCYC INNER JOIN usuarios on (contratoCYC.id_usuario=usuarios.id_usuario) WHERE usuarios.id_usuario = '" . $uid . "'";
$rs_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs_result);

echo "<pre>";
print_r($row['nombre']);
echo "</pre>";
// $nombre = $row["nombre"];
