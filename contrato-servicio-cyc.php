<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login?p=cuenta");
} else {
    $uid = $_SESSION['user'];
}
include_once 'dbconnect.php';

require_once 'include/header.php';

?>

<style>
    #signatureparent {
        width: 300px;
        border-bottom: 2px solid #333333;
    }

    .d-none {
        display: none;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }
</style>

<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">
    <h1 class="h1cuenta" style="color: #db4537;">CONTRATO DE COMERCIALIZACION SERVICIOS CONECTA Y COMPRA</h1>

    <div class="flex">
        <form method="post" id="form-cyc" enctype="multipart/form-data">
            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" name="nombre" id="nombre" class="form-control nombre" placeholder="Nombre Completo*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" class="form-control fecha-nacimiento" placeholder="Fecha de Nacimiento*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" name="lugar-nacimiento" id="lugar-nacimiento" class="form-control lugar-nacimiento" placeholder="Lugar de Nacimiento*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <input type="text" name="domicilio" id="domicilio" class="form-control domicilio" placeholder="Domicilio*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <input type="email" name="email" id="email" class="form-control email" placeholder="Correo Electrónico*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <input type="file" name="ine" id="ine" class="form-control ine" placeholder="Identificación Oifical*">
            </div>

            <!-- <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <input type="text" name="folio" class="form-control direccion" placeholder="Folio">
        </div> -->

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-folder-close"></span>
                </span>
                <input type="text" name="curp" id="curp" class="form-control curp" placeholder="CURP*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-folder-close"></span>
                </span>
                <input type="text" name="rfc" id="rfc" class="form-control rfc" placeholder="RFC*">
            </div>

            <div class="input-group" style="margin-bottom: 4rem;text-align: center;">
                <div id="signatureparent"></div>
                <span style="color:red;">Firmar con mouse o tactil*</span>
            </div>

            <div class="input-group d-none">
                <input type="text" name="firmaDigital" readonly id="firmaDigital">
            </div>

            <div class="input-group">
                <input type="submit" class="form-control btn btn-success" id="btn-enviar-cyc" value="Enviar">
            </div>
        </form>

    </div>

</div>


<?php require_once 'include/footer.php'; ?>

<script>
    $(document).ready(function() {

        $("#signatureparent").jSignature({
            color: "#333",
            lineWidth: 1,
            width: 250,
            height: 100
        });

        // Funcion para crear cookies
        function crearCookie(nombre, valor, diasExpiracion) {

            var hoy = new Date();
            hoy.setTime(hoy.getTime() + (diasExpiracion * 24 * 60 * 60 * 1000));

            var fechaExpriacion = "expires" + hoy.toUTCString();

            document.cookie = nombre + "=" + valor + ";" + fechaExpriacion;

        }

        $("#form-cyc").submit(function(event) {
            event.preventDefault();

            if ($("#nombre").val() == '') {
                toastr.warning('Ingresa tu nombre');
                return;
            }

            if ($("#fecha-nacimiento").val() == '') {
                toastr.warning('Ingresa tu fecha de nacimiento');
                return;
            }

            if ($("#lugar-nacimiento").val() == '') {
                toastr.warning('Ingresa tu lugar de nacimiento');
                return;
            }

            if ($("#domicilio").val() == '') {
                toastr.warning('Ingresa tu domicilio');
                return;
            }

            if ($("#email").val() == '') {
                toastr.warning('Ingresa tu correo electrónico');
                return;
            }

            if ($("#curp").val() == '' || $("#curp").val().length < 10) {
                toastr.warning('Ingresa tu CURP');
                return;
            }

            if ($("#rfc").val() == '' || $("#rfc").val().length < 5) {
                toastr.warning('Ingresa tu RFC');
                return;
            }           


            if ($("#signatureparent").jSignature("isModified")) {
                var firma = $("#signatureparent").jSignature("getData", "image/svg+xml"); 
            }

            crearCookie("firmaContrato", firma[1], 1);

            // enviar();
            setTimeout(enviar, 3000);

            $("#form-cyc").waitMe();

        })

        function enviar() {
            // var datos = $("#form-cyc").formData();

            var form = $(this),
                data = new FormData($("#form-cyc").get(0));

            $.ajax({
                type: "post",
                url: "insertar-contrato-servicio.php",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                // dataType: 'json',
                beforeSend: function(){
                    $("#form-cyc").waitMe();
                },
                success: function(respuesta) {
                    // setTimeout($("#form-cyc").waitMe('hide'), 5000);
                    $("#form-cyc").waitMe('hide');
                    swal({
                        icon: "success",
                        text: "Datos almacenados correctamente",
                        button: {
                            text: "FIRMAR SIGUIENTE CONTRATO"
                        },
                        closeModal: false
                    }).then((url) => {
                        url = "contrato-cyc.php";
                        window.location.href = url;
                    });
                }
            })
        }
    })
</script>

</body>

</html>
<?php ob_end_flush(); ?>