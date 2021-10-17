<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap4.min.css" />

<?php
// Incluimos la conexion a la DB
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el o los querys
$query_productos = "SELECT productos.*, tiendas.* FROM productos INNER JOIN tiendas on (productos.id_tienda=tiendas.id_tienda)"; // Query para los productos

// Consultar la BD
$resultado_productos = mysqli_query($db, $query_productos); // Consulta para las productos

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
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Productos</h1>
                        <p class="lead">Estos son los productos activos actualmente.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered dt-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th>Tienda</th>
                                    <th>Resumen</th>
                                    <th>URL</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($rows = mysqli_fetch_assoc($resultado_productos)) :
                                ?>
                                    <tr>
                                        <td><?php echo $rows['id_producto'] ?></td>
                                        <td><?php echo $rows['nombre'] ?></td>
                                        <td><?php echo $rows['titulo'] ?></td>
                                        <td><?php echo $rows['resumen'] ?></td>
                                        <td><a href="http://digitaltryout.com/cyc/tienda/<?php echo $rows['url'] ?>" target="_blank"><?php echo $rows['url'] ?></a></td>
                                        <td><?php echo $rows['precio1'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


</script>
<?php
incluirTemplate('footer');
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            processing: true,
            responsive: true,
            autoWidth: false,
            'language': {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron registros",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del  _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente.",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente."

                }
            }
        });
    });
</script>