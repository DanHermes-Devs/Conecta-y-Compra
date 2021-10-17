<?php

ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}

require_once 'dbconnect.php';

$id_usuario = $_SESSION['user'];
$nombre = $_POST["nombre"];
$fecha_nacimiento = $_POST['fecha-nacimiento'];
$lugar_nacimiento = $_POST['lugar-nacimiento'];
$domicilio = $_POST['domicilio'];
$email = $_POST['email'];
$ine = $_FILES['ine'];
$curp = $_POST['curp'];
$rfc = $_POST["rfc"];
$firmaDigital = $_COOKIE["firmaContrato"];

$numero_aleatorio = rand(15,15000);
$numero_aleatorio2 = rand(15,15000);

$rand = $numero_aleatorio.'_'.$numero_aleatorio2;

if(isset($_FILES['ine']) && $_FILES['ine']['error'] !== 4){
    $img = $_FILES['ine'];
    $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
    $new_name = $rand.'.'.$ext;

    if(!move_uploaded_file($img['tmp_name'] , 'img/uploads/'.$new_name)){
        echo "Ha ocurrido un error";
    }

    $ine = $new_name;

}


$cons2 = "INSERT INTO contratoServiciosCYC (id_usuario, nombre_contrato, fecha_nacimiento, lugar_nacimiento, domicilio, email, ine, curp, rfc, firma) VALUES ($id_usuario, '$nombre', '$fecha_nacimiento', '$lugar_nacimiento', '$domicilio', '$email', '$ine', '$curp', '$rfc', '$firmaDigital')";
$ejecutarSQL2 = mysqli_query ($conn, $cons2);