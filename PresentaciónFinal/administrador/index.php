<?php
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$date = new DateTime();
$fecha_inicio = $date->format('Y-m-d H:i:s');
include '../conexion.php';
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

    <title>ADMIN-S.E.E</title>

    <script type="text/javascript" language="javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
    </script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Estadística Docente</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!--NAVBAR-->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0" style="color: #fff">

                <?php

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

    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <h3>SISTEMA DE ESTADÍSTICA DOCENTE</h3>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="btn-group">
                        <button class="float-right btn btn-primary" id="boton_agregar">
                            Agregar Encuesta
                        </button>
                        <div class="col-md-5">
                            <a href="../Menu/menu.php"><button class="float-right btn btn-warning"
                                    style="color: white;">
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
                <h4>Encuestas:</h4>
                <div class="table-responsive">
                    <div id="tabla_encuestas"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Content Section -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="../js/jquery-3.6.0.min.js"></script>
    <?php

    ?>

    <script src="js/encuestas.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>


</body>

</html>

<!-- Modal Agregar Nueva Encuesta -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Agregar Nueva Encuesta</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="Filtro" method="POST">
                    <div class="form-group row">
                        <label for="titulo" class="col-sm-3 col-form-label">Nombre de la Encuesta</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                placeholder="Nombre de la Encuesta" autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-3 col-form-label">Carrera o Materia</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="descripcion" name="descripcion"
                                placeholder="Carrera o Materia"></textarea>
                        </div>
                    </div>
                    <!--SELECT DE LAS CARRERAS CARGADAS EN BD-->
                    <div class="form-group row">
                        <label for="carrera" class="col-sm-3 col-form-label">CARRERAS</label>
                        <?php
                        $query = $con->query("SELECT * FROM carrera");
                        ?>
                        <div class="col-sm-9">
                            <select name="carrera" class="form-control">
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($valores = mysqli_fetch_array($query)) {
                                ?>
                                <?php
                                    echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!---------------------------------SELECT MATERIAS EN  BD-------------------------------------------------->
                    <div class="form-group row">
                        <label for="materia" class="col-sm-3 col-form-label">MATERIAS</label>
                        <?php
                        $query = $con->query("SELECT * FROM materia");
                        ?>
                        <div class="col-sm-9">
                            <select name="materia" class="form-control">
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($valores = mysqli_fetch_array($query)) {
                                ?>
                                <?php
                                    echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------------>

                    <div class="form-group row">
                        <label for="fecha_final" class="col-sm-3 col-form-label">Fecha de Cierre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fecha_final" name="fecha_final"
                                value="<?php echo $fecha_inicio ?>" autocomplete="off">
                            <p>Fomato: año-mes-día horas:minutos:segundos</p>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardar" onclick="agregarEncuesta()">Agregar
                    Encuesta</button>
                <input type="hidden" id="hidden_id_usuario" name="id_usuario"
                    value="<?php echo $_SESSION['id_usuario'] ?>">
            </div>
            </form>

        </div>
    </div>
</div>



<!-- Modal Modificar Producto -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Modificar Producto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group row">
                    <label for="modificar_titulo" class="col-sm-3 col-form-label">Nombre de la Encuesta</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="modificar_titulo"
                            placeholder="Nombre de la Encuesta">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descripcion" class="col-sm-3 col-form-label">Carrera o Materia</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="modificar_descripcion"
                            placeholder="Carrera o Materia"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_final" class="col-sm-3 col-form-label">Fecha de Cierre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="modificar_fecha_final" placeholder="Fecha de Cierre"
                            autocomplete="off" value="<?php echo $fecha_inicio ?>">
                        <p>Fomato: año-mes-día horas:minutos:segundos</p>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesEncuesta()">Modificar
                    Encuesta</button>
                <input type="hidden" id="hidden_id_encuesta">
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#Filtro')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "ajax_encuesta/agregarEncuesta.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Error al cargar");

                } else {
                    alert("Agregado con exito");
                    $("#modal_agregar").modal("hide");
                    mostrarEncuestas();
                    $("#titulo").val("");
                    $("#carrera").val("");
                    $("#materia").val("");
                    $("#descripcion").val("");
                    $("#fecha_final").val("");
                }
            }
        });
        //return false; //evita que se recargue y pierda los datos del form
    });

});
</script>