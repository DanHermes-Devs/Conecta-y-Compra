<?php include 'header.php'; ?>

<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $sql = "SELECT usuarios.*, tiendas.* FROM tiendas INNER JOIN usuarios ON (usuarios.id_usuario=tiendas.id_usuario)";
    $res = mysqli_query($mysqli, $sql);
    

?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#">Usuarios</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid p-3">
                <div class="container">
                    <h1 class="display-3">CONTRATO DE COMERCIALIZACION CONECTA Y COMPRA</h1>
                    <p class="lead">Aquí puede editar libremente este contrato.</p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-12">
                    <form action="#">
                        <input id="x" type="hidden" name="content">
                        <trix-editor input="x"></trix-editor>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>