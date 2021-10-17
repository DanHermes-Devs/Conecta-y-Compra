<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}

require_once 'dbconnect.php';


if(isset($_POST["suscripcion"]) && $_POST["suscripcion"] === "ok"){
    echo "hola";
}