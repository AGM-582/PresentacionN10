<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="styles_Contactanos.css">

    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <div class="content">

        <h1 class="logo">Contacta<span>Nos</span></h1>

        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contactos</h3>
                <form id="enviarMail" method="POST">
                    <p>
                        <label>Nombre Completo</label>
                        <input type="text" id='Nombre' name="Nombre" placeholder="Ingrese Nombre Completo" required>
                    </p>
                    <p>
                        <label>Correo</label>
                        <input type="email" id='Correo' name="Correo" placeholder="Ingrese Correo" required>
                    </p>
                    <p>
                        <label>Celular</label>
                        <input type="tel" id='Celular' name="Celular" placeholder="Ingrese el Número de Celular"
                            required>
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" id='Asunto' name="Asunto" placeholder="Ingrese el Título del Asunto"
                            required>
                    </p>
                    <p class="block">
                        <label>Descripción</label>
                        <textarea id='Mensaje' name="Mensaje" placeholder="Describa la Situación" rows="5"
                            required></textarea>
                    </p>
                    <p class="block">
                        <button id="btnGuardar">
                            Enviar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>Más Información</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Calle 120 Nº 6710</li>
                    <!-- <li><i class="fas fa-phone"></i> </li>-->
                    <li><i class="fas fa-envelope-open-text"></i> mejorizarservicios@gmail.com</li>
                </ul>
                <p> No somos una empresa, sólo un grupo de chicos haciendo cosas.</p>
                <!-- Copyright -->
                <div class="text-center p-3">
                    © 2021 Copyright:
                    <a class="text-white" style="color: white;" href="www.google.com.ar">Mejorizar.com</a>
                </div>
                <div>
                    <a href="index.php"><button type="button"
                            style="background-color: #2075F8;border-radius: 10px;padding: 5px">Volver al
                            Inicio</button></a>
                </div>
            </div>

        </div>

</body>

</html>

<!-------------probando alert de envio de mail------------------------------------------------------------------------>
<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#enviarMail')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "enviarEmail.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Email enviado con éxito");
                    $("#Nombre").val("");
                    $("#Correo").val("");
                    $("#Celular").val("");
                    $("#Asunto").val("");
                    $("#Mensaje").val("");
                } else {
                    alert("Error al enviar");
                }
            }
        });
        return false; //evita que se recargue y pierda los datos del form
    });

});
</script>