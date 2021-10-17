<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap4.min.css" />

<?php
// Incluimos la conexion a la DB
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el o los querys
$query_orden  = "SELECT p.`id_pedido`, p.`referencia_cobro`, p.`id_transaccion_paypal`, DATE_FORMAT(p.`fecha`, '%d/%m/%Y') as fecha, p.`monto`, p.`status`, p.`costo_envio` FROM `pedidos` p "; 

// Consultar la BD
$resultado_orden  = mysqli_query($db, $query_orden); // Consulta para las usuarios

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
                        <h1 class="m-0">Ordenes</h1>
                        <p class="lead">Este es el total de ordenes realizadas.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered dt-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Ref. / Transacción</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($rows = mysqli_fetch_assoc($resultado_orden)) :
                                ?>
                                    <tr>
                                        <td><?php echo $rows['id_pedido']; ?></td>
                                        <td><?php echo $rows['referencia_cobro']; echo $rows['id_transaccion_paypal']?></td>
                                        <td><?php echo $rows['fecha']; ?></td>
                                        <td>$<?php echo bcdiv($rows['monto'], '1', 2); ?></td>
                                        <td><?php echo $rows['status']; ?></td>
                                        <td>
                                            <a href="/cyc/admin/pedidos?id=<?php echo $rows['id_pedido']; ?>" class="btn btn-success text-white">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <!-- <a onClick="fntBtnDelete(<?php echo $rows['id_pedido']; ?>)" class="btn btn-danger text-white">Eliminar</a>
                                            <a onClick="fntBtnEditar(this, <?php echo $rows['id_pedido']; ?>)" class="btn btn-primary text-white">Editar</a> -->
                                        </td>
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
            autoWidth: true,
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