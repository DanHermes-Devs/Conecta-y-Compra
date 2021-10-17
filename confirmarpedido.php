<?php

ob_start();
session_start();
if (!isset($_SESSION['user'])) {
}
$uid = $_SESSION['user'];
include_once 'dbconnect.php';
require_once 'include/header.php';

if(empty($_SESSION['dataorden'])){
    header("Location: /cyc/cuenta");
} else {
    $dataorden = $_SESSION['dataorden'];
    $idPedido = openssl_decrypt($dataorden['orden'], "AES-128-ECB", "conectaycompra");
    $transaccion1 = openssl_decrypt($dataorden['transaccion'], "AES-128-ECB", "conectaycompra"); ?>
        <div class="container pagecont" style="width: 100%; padding: 50px 15px; margin-top:100px;">
            <div class="container ">
                <div class="jumbotron text-center">
                    <h1>¡Gracias por tu compra!</h1>
                    <p>Tu pedido fue procesado con éxito.</p>
                    <p>No. Orden: <strong><?php echo $idPedido; ?></strong></p>
                    <?php 

                        if(!empty($dataorden['transaccion'])){?>

                            <p>Transacción: <strong><?php echo $transaccion1; ?></strong></p>

                    <?php } ?>
                    <p>Muy pronto estaremos en contacto para coordinar la entrega.</p>
                    <p>Puedes ver el estado de tu pedido en la sección <strong>Mis Pedidos</strong> de tu perfil.</p>
                    <p><a class="btn btn-primary btn-lg" href="/cyc" role="button">Continuar</a></p>
                </div>
            </div>
        </div>


<?php 
} 
unset($_SESSION['dataorden']); 
?>



<?php require_once 'include/footer.php'; ?>

</body>

</html>