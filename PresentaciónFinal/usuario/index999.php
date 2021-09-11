<?php

date_default_timezone_get();
$date = new DateTime();

$fecha_inicio = $date->format('Y-m-d H:i:s');

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../M-ByTailorBrands.png">

    <title>USUARIO-Encuestas</title>
    <script type="text/javascript" language="javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
    </script>

</head>

<body onload="pepe()">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!--NAVBAR-->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form id="datosUsuario" method="POST" action="../mostrarEncuestas.php" class="form-inline my-2 my-lg-0"
                style="color: #fff">

                <?php
                session_start();
                if (isset($_SESSION['u_usuario']) && isset($_SESSION['id_usuario'])) {
                    $idAlumno = $_SESSION['id_usuario'];
                    echo "Bienvenido " . $_SESSION['u_usuario'] . "\t";

                    echo "<a href='../cerrar_sesion.php' class='btn btn-danger' style='margin-left: 10px'>Cerrar Sesión</a>";
                } else {
                    header("Location: ../index.php");
                }

                ?>
                <label><input class="form-check-input" type="checkbox" style="display:none" checked="checked"
                        name="idAlumno" value="<?php echo $_SESSION['id_usuario'] ?>">

            </form>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-12 col-xs-12">
                    <h3>SISTEMA DE ENCUESTAS</h3>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <h4>Encuestas:</h4>
                <div class="table-responsive">
                    <div id="tabla_encuestas"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content Section -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/encuestas.js"></script>

</body>

</html>


<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function pepe() {

    var datos = $('#datosUsuario').serialize(); //serialize trabaja con el id del form y los names de los inputs
    alert(datos);
    return false;
    $.ajax({
        type: "POST",
        url: "ajax_encuesta/mostrarEncuestas.php",
        data: datos,
    });
    //return false; //evita que se recargue y pierda los datos del form
});
</script>