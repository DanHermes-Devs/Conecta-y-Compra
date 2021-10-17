<?php
// Incluimos la conexion a la DB
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el o los querys
$query_tiendas   = "SELECT COUNT(activo) FROM tiendas WHERE activo           = 1"; // Query para las tiendas
$query_usuarios  = "SELECT COUNT(activo) FROM usuarios WHERE activo          = 1"; // Query para los usuarios
$query_productos = "SELECT COUNT(activo) FROM productos WHERE activo         = 1"; // Query para los productos
$query_ordenes   = "SELECT COUNT(id) FROM orden"; // Query para los ordenes

// Consultar la BD
$resultado_tiendas   = mysqli_query($db, $query_tiendas); // Consulta para las tiendas
$resultado_usuarios  = mysqli_query($db, $query_usuarios); // Consulta para las usuarios
$resultado_productos = mysqli_query($db, $query_productos); // Consulta para las productos
$resultado_ordenes   = mysqli_query($db, $query_ordenes); // Consulta para las ordenes

// Incluimos template
require 'includes/funciones.php';
incluirTemplate('header');

?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">

    </div>
  </div>



  <section class="content">
    <div class="container-fluid">

      <div class="card p-4">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  while ($tiendas = mysqli_fetch_assoc($resultado_tiendas)) {
                    echo $tiendas['COUNT(activo)'];
                  }
                  ?>
                </h3>

                <p>Tiendas Activas</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  while ($productos = mysqli_fetch_assoc($resultado_productos)) {
                    echo $productos['COUNT(activo)'];
                  }
                  ?>
                </h3>

                <p>Productos Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetags"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  while ($usuarios = mysqli_fetch_assoc($resultado_usuarios)) {
                    echo $usuarios['COUNT(activo)'];
                  }
                  ?>
                </h3>

                <p>Usuarios Registrados Activos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  while ($ordenes = mysqli_fetch_assoc($resultado_ordenes)) {
                    echo $ordenes['COUNT(id)'];
                  }
                  ?>
                </h3>

                <p>Ordenes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>


    </div>
  </section>

</div>
<?php
incluirTemplate('footer');
?>