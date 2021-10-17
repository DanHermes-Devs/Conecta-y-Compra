<?php
include_once 'dbconnect.php';

$sql1 = "SELECT * FROM usuarios";
$result1 = $mysqli->query($sql1)  or die("Error en".$sql1);
$numusuarios = $result1->num_rows;

$sql2 = "SELECT * FROM tiendas WHERE activo = 1";
$result2 = $mysqli->query($sql2)  or die("Error en".$sql2);
$numtiendas = $result2->num_rows;

$sql3 = "SELECT * FROM productos WHERE activo = 1";
$result3 = $mysqli->query($sql3)  or die("Error en".$sql3);
$numproductos = $result3->num_rows;

$host = $_SERVER["REQUEST_URI"];
$url = pathinfo($host, PATHINFO_FILENAME);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" href="/cyc/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Dashboard Conecta y Compra
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

    <!-- Datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- END Datatable -->

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/responsive.bootstrap.min.css">

    <!-- App.css -->
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- END App.css -->

    <!-- TrixEditor -->
    <link rel="stylesheet" href="assets/css/trix.css">
    <!-- END TrixEditor -->

    <style>
    .nav.navbar-nav.nav-mobile-menu {
        display: none;
    }

    .navbar-form {
        display: none;
    }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    CONECTA Y COMPRA
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

                    <li <?php if ($url=="admin") echo " class='nav-item active'"; ?>>
                        <a class="nav-link" href="./index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php if ($url=="usuarios") echo " class='nav-item active'"; ?>>
                        <a class="nav-link" href="./usuarios.php">
                            <i class="material-icons">person</i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li <?php if ($url=="tiendas") echo " class='nav-item active'"; ?>>
                        <a class="nav-link" href="./tiendas.php">
                            <i class="material-icons">store</i>
                            <p>Tiendas</p>
                        </a>
                    </li>
                    <li <?php if ($url=="productos") echo " class='nav-item active'"; ?>>
                        <a class="nav-link" href="./productos.php">
                            <i class="material-icons">local_offer</i>
                            <p>Productos</p>
                        </a>
                    </li>
                    <li <?php if ($url=="pedidos") echo " class='nav-item active'"; ?>>
                        <a class="nav-link" href="./pedidos.php">
                            <i class="material-icons">local_grocery_store</i>
                            <p>Pedidos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>