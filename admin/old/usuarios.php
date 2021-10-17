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
                    <h1 class="display-3">Usuarios con Tienda</h1>
                    <p class="lead">Estos usuarios tienen una tienda activa actualmente.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                    <table class="table table-striped table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Tienda</th>
                                <th>Email</th>
                                <th>Suscripción Activa</th>
                                <th>Teléfono</th>
                                <th>Activo</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                while($rows = mysqli_fetch_assoc($res)):
                            ?>
                            <tr>
                                <td><?php echo $rows['id_usuario'] ?></td>
                                <td><?php echo $rows['nombre'] ?></td>
                                <td><?php echo $rows['titulo'] ?></td>
                                <td><?php echo $rows['email'] ?></td>
                                <td><?php echo $rows['id_suscripcion'] ?></td>
                                <td><?php echo $rows['telefono'] ?></td>
                                <td><?php echo $rows['activo'] ?></td>
                                <td class="td-actions text-right">
                                    <a type="button" rel="tooltip" class="btn btn-info text-white btn-round">
                                        <i class="material-icons">person</i>
                                    </a>
                                    <a type="button" rel="tooltip" class="btn btn-success text-white btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a type="button" rel="tooltip" class="btn btn-danger text-white btn-round">
                                        <i class="material-icons">close</i>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>

<script>
$(document).ready(function() {
    $('.table').DataTable({
        'language': {

            "sProcessing"     : "Procesando...",
            "sLengthMenu"     : "Mostrar _MENU_ registros",
            "sZeroRecords"    : "No se encontraron registros",
            "sEmptyTable"     : "Ningún dato disponible en esta tabla",
            "sInfo"           : "Mostrando registros del  _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty"      : "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered"   : "(Filtrado de un total de _MAX_ registros)",
            "sInfoPostFix"    : "",
            "sSearch"         : "Buscar:",
            "sUrl"            : "",
            "sInfoThousands"  : ",",
            "sLoadingRecords" : "Cargando...",
            "oPaginate"     : {
                "sFirst"    : "Primero",
                "sLast"     : "Último",
                "sNext"     : "Siguiente",
                "sPrevious" : "Anterior"
            },
            "oAria"         : {
                "sSortAscending" : ": Activar para ordenar la columna de manera ascendente.",
                "sSortDescending" : ": Activar para ordenar la columna de manera descendente."
                
            }
        }
    });
} );
</script>