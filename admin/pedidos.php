<?php

  $id = $_GET['id'];
  // Incluimos la conexion a la DB
  require 'includes/config/database.php';
  $db = conectarDB();

  // Escribir el o los querys
  $query_orden  = "SELECT 
                            p.`id_pedido`, 
                            p.`referencia_cobro`,
                            id_usuario,
                            p.`id_transaccion_paypal`, 
                            DATE_FORMAT(p.`fecha`, '%d/%m/%Y') as fecha, 
                            p.`monto`, 
                            p.`status`,
                            p.`direccion_envio`,
                            p.`costo_envio`
                            FROM `pedidos` p  
                            WHERE p.`id_pedido` = $id";


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
        <div class="wrapper">
        <?php
        while ($rows = mysqli_fetch_assoc($resultado_orden)) :
            // echo json_encode($rows);
            $idUsuario = $rows['id_usuario'];
            $idPedido = $rows['id_pedido'];
            // Escribir el o los querys
            $query_usuario  = "SELECT 
                                        a.nombre, 
                                        a.email, 
                                        a.telefono, 
                                        b.calle, 
                                        b.numero_interior, 
                                        b.numero_exterior, 
                                        b.colonia, 
                                        b.cp, 
                                        b.municipio, 
                                        b.estado 
                                        FROM usuarios a 
                                        INNER JOIN direcciones b on (a.id_usuario=b.id_usuario)
                                        WHERE a.id_usuario = $idUsuario";

            $resultado_usuario  = mysqli_query($db, $query_usuario); // Consulta para las usuarios
            while ($rowsu = mysqli_fetch_assoc($resultado_usuario)) :
        ?>
          <!-- Main content -->
          <section class="invoice" id="sPedido">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h2 class="page-header">
                  <i class="fas fa-globe"></i> Conecta y Compra.
                  <small class="float-right">Fecha: <?php echo $rows['fecha']; ?></small>
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Direccion del Vendedor
                <address>
                  <strong>Conecta y Compra.</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Celular: 5555555555<br>
                  Correo: ventas@conectaycompra.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Dirección del Comprador
                <address>
                  <strong><?php echo $rowsu['nombre']; ?></strong><br>
                  <?php echo $rowsu['numero_exterior']; echo " "; echo $rowsu['calle']; ?><br>
                  <?php echo $rows['direccion_envio']; ?> <br>
                  Celular: <?php echo $rowsu['telefono']; ?><br>
                  Correo: <?php echo $rowsu['email']; ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Order ID:</b> <?php echo $rows['id_pedido']; ?><br>
                <b>Pago:</b> Paypal<br>
                <b>Transacción:</b> <?php echo $rows['id_transaccion_paypal']; ?><br>
                <b>Estado:</b> <?php echo $rows['status']; ?><br>
                <b>Monto:</b> $<?php echo bcdiv($rows['monto'], '1', 2); ?><br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Cantidad</th>
                      <th>Importe</th>
                      <th>Importe</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        $subtotal = 0;
                        $costoEnvio = 0;
                        $total = 0;
                        $query_detalle  = "SELECT p.id_pedido, p.direccion_envio, p.costo_envio, dp.id_producto, dp.precio, dp.cantidad, pr.nombre
                                                FROM pedidos p 
                                                INNER JOIN detalle_pedido dp on (p.id_pedido=dp.id_pedido) 
                                                INNER JOIN productos pr on (dp.id_producto=pr.id_producto) 
                                                WHERE p.id_pedido = $idPedido";

                        $resultado_detalle  = mysqli_query($db, $query_detalle); // Consulta para las usuarios
                        while ($rowsd = mysqli_fetch_assoc($resultado_detalle)) : 
                            $subtotal += $rowsd['cantidad'] * $rowsd['precio'];
                            $costoEnvio = $rowsd['costo_envio'];
                            $total = $subtotal + $costoEnvio;
                        ?>
                        
                            <tr>
                                <td><?php echo $rowsd['nombre']; ?></td>
                                <td><?php echo $rowsd['cantidad']; ?></td>
                                <td>$<?php echo $rowsd['precio']; ?></td>
                                <td>$<?= bcdiv($rowsd['cantidad'] * $rowsd['precio'], '1', 2); ?></td>
                            </tr>                    
                        <?php endwhile; ?>                   
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row justify-content-end">
              <!-- /.col -->
              <div class="col-6">

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>$<?php echo bcdiv($subtotal, '1', 2); ?></td>
                    </tr>
                    <tr>
                      <th>Costo de envío:</th>
                      <td>$<?php echo bcdiv($costoEnvio, '1', 2); ?></td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>$<?php echo $total; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
            <?php endwhile; ?>
          <?php endwhile; ?>
          <div class="row d-print-none mt-2">
              <div class="col-12 text-right">
                  <a href="javascript:window.print('#sPedido')" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</a>
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
