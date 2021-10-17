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

    <h1 class="h1cuenta" style="color: #db4537;">CONTRATO DE COMERCIALIZACION CONECTA Y COMPRA</h1>

    <div class="flex">
        <form action="#" method="post" id="form-cyc">
            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" name="nombre" id="nombre" class="form-control nombre" placeholder="Nombre Completo*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <input type="email" name="email" id="email" class="form-control email" placeholder="Correo Electrónico*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-folder-close"></span>
                </span>
                <input type="text" name="rfc" id="rfc" class="form-control rfc" placeholder="RFC*">
            </div>

            <div class="input-group mt-4">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <input type="text" name="direccion" id="direccion" class="form-control direccion" placeholder="Dirección*">
            </div>

            <div class="input-group" style="margin-bottom: 4rem;text-align: center;">
                <div id="signatureparent"></div>
                <span style="color:red;">Firmar con mouse o tactil*</span>
            </div>

            <div class="input-group d-none">
                <input type="text" name="firmaDigital" readonly id="firmaDigital">
            </div>

            <div class="input-group d-none">
                <input type="text" name="suscripcion" value="ok" readonly id="suscripcion">
            </div>

            <div class="input-group">
                <input type="submit" class="form-control btn btn-success" id="btn-enviar-cyc" value="SUSCRIBIR A CONECTA Y COMPRA">
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

            var nombre = $("#nombre").val();
            var email = $("#email").val();
            var rfc = $("#rfc").val();
            var direccion = $("#direccion").val();
            var suscripcion = $("#suscripcion").val();     
   
            if ($("#signatureparent").jSignature("isModified")) {
                var firma = $("#signatureparent").jSignature("getData", "image/svg+xml");
                console.log(firma[1]);
                // console.log(base64);   
            }

            var base645 = "data:" + firma.join(',');
            document.getElementById("firmaDigital").value = base645;

            crearCookie("nombre", nombre, 1);
            crearCookie("email", email, 1);
            crearCookie("direccion", direccion, 1);
            crearCookie("rfc", rfc, 1);
            crearCookie("firma", firma[1], 1);

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
                url: "insertar-contrato-cyc.php",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                // dataType: 'json',
                beforeSend: function() {
                    $("#form-cyc").waitMe();
                },
                success: function(respuesta) {
                    // setTimeout($("#form-cyc").waitMe('hide'), 5000);
                    $("#form-cyc").waitMe('hide');
                    window.location = respuesta;

                    // swal({
                    //     icon: "success",
                    //     text: "Datos almacenados correctamente",
                    //     text: "Ahora podras descargar los contratos.",
                    //     button: {
                    //         text: "Descargar Contratos"
                    //     },
                    //     closeModal: false
                    // });

                    // .then((url) => {
                    //     url = "descarga-contratos.php";
                    //     window.location.href = url;
                    // })
                }
            })
        }
    })
</script>

</body>

</html>
<?php ob_end_flush(); ?>