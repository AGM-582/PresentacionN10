<?php

include("../conexion.php");

$id_encuesta = $_GET['id_encuesta'];

$query = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
$respuesta = $con->query($query);
$row = $respuesta->fetch_assoc();

$query3 = "SELECT * FROM tipo_pregunta";
$respuesta3 = $con->query($query3);

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

    <title>ADMIN-Preguntas</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!--NAVBAR-->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0" style="color: #fff">

                <?php
                session_start();
                if (isset($_SESSION['u_usuario'])) {
                    echo "Bienvenido " . $_SESSION['u_usuario'] . "\t";

                    echo "<a href='../cerrar_sesion.php' class='btn btn-danger' style='margin-left: 10px'>Cerrar Sesión</a>";
                } else {
                    header("Location: ../index.php");
                }


                ?>

            </form>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <h3><?php echo $row['titulo'] ?></h3>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="btn-group">
                        <button class="float-right btn btn-primary" id="boton_agregar">
                            Agregar Pregunta
                        </button>
                        <div class="col-md-5">
                            <a href="index.php"><button class="float-right btn btn-warning" style="color: white;">
                                    Regresar
                                </button></a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <h4>Preguntas:</h4>
                <input type="hidden" id="id_encuesta" value="<?php echo $row['id_encuesta'] ?>">
                <div class="table-responsive">
                    <div id="tabla_preguntas"></div>
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
    <script src="js/preguntas.js"></script>


</body>

</html>

<!-- Modal Agregar Nueva Pregunta -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Agregar Nueva Pregunta</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="cargaPreguntas" method="POST">
                    <input type="hidden" id="id_encuesta" name="id_encuesta" value="<?php echo $row['id_encuesta'] ?>">
                    <!--<input type="checkbox" name="id_encuesta" checked value="<?php $id_encuesta ?>">-->
                    <div class="form-group row">
                        <label for="titulo" class="col-sm-3 col-form-label">Título</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="titulo" class="col-sm-3 col-form-label">Tipo</label>
                        <div class="col-sm-9">
                            <select name="id_tipo_pregunta" class="form-control">
                                <?php
                                while ($row3 = $respuesta3->fetch_assoc()) {
                                ?>
                                    <option id="id_tipo_pregunta" value="<?php echo $row3['id_tipo_pregunta'] ?>" required>
                                        <?php echo $row3['nombre'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardar">Agregar
                    Pregunta</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Modificar Pregunta -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Modificar Pregunta</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                    <label for="modificar_titulo" class="col-sm-3 col-form-label">Título</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="modificar_titulo" placeholder="Título">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesPregunta()">Modificar
                    Pregunta</button>
                <input type="hidden" id="hidden_id_pregunta">
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    //en teoria esto es jquery
    $(document).ready(function() {
        $('#btnGuardar').click(function() {
            var datos = $('#cargaPreguntas')
                .serialize(); //serialize trabaja con el id del form y los names de los inputs
            //alert(datos);
            //return false;
            $.ajax({
                type: "POST",
                url: "registrarPreguntas.php",
                data: datos,
                success: function(r) {
                    if (r == 0) {
                        alert("Error al cargar");
                    } else {
                        alert("Agregado con exito");
                        $("#modal_agregar").modal("hide");
                        mostrarPreguntas(id_encuesta);
                        $("#titulo").val("");
                    }
                }
            });
            //return false; //evita que se recargue y pierda los datos del form
        });

    });
</script>