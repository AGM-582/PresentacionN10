<?php
include '../../conexion.php';
$query = "SELECT carrera, id FROM alumno ORDER BY id DESC LIMIT 1";

$resultado = $con->query($query);

$coso = mysqli_fetch_array($resultado);
$idCarrera = (int)$coso[0];
$idAlumno = (int)$coso[1];



$query4 = "SELECT  carrera.nombre,carrera.duracionAnios 
FROM carrera
WHERE carrera.id = '$idCarrera'";
$respuesta4 = $con->query($query4);
$row4 = mysqli_fetch_array($respuesta4);

$query3 = "SELECT materia.id, materia.idCarrera, materia.nombre, materia.anio 
		FROM materia
		WHERE materia.idCarrera = '$idCarrera'";
$respuesta3 = $con->query($query3);
//$row3 = mysqli_fetch_array($respuesta3);

//////////////////////////////////////////////////////////////////////////////////////////////////////


?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="stylos_Alumno.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!--<script src="../js/alumno.js"></script>-->
    <div class="container">
        <div class="title">CARRERA: <?php echo $row4[0] ?></div>

        <!--<div class="title">MATERIAS:</div>-->
        <div class="content">
            <form id="cargaMaterias" method="POST" action="registroInscripciones.php">

                <div class="user-details">
                    <div class="container col-md-12">

                        <!--<div class="input-box">-->
                        <label><input class="form-check-input" type="checkbox" style="display:none" checked="checked"
                                name="idCarrera" value="<?php echo $idCarrera ?>"></input></label>
                        <label><input class="form-check-input" type="checkbox" style="display:none" checked="checked"
                                name="idAlumno" value="<?php echo $idAlumno ?>"></input></label>

                        <?php

                        $i = 1;
                        $siguienteAnio = 0;
                        while (($row3 = $respuesta3->fetch_assoc())) {
                            //este if sirve para escribir los años arriba del listado de materias
                            if ($row3['anio'] > $siguienteAnio) {
                                //echo '<br>';
                                echo $row3['anio'] . 'º AÑO:';
                            }
                        ?>

                        <div class="radio">
                            <label><input class="form-check-input" type="checkbox" name="materia[]"
                                    value="<?php echo $row3['id'] ?>">
                                <?php echo $row3['nombre'] ?></input></label>
                        </div>
                        <?php
                            $siguienteAnio = $row3['anio'];
                        }
                        $i++;
                        ?>


                    </div>
                    <div class="button">
                        <button type="submit" id="btnGuardar" name="enviar">Agregar Inscripciones</button>
                    </div>
                    <?php
                    ?>
                </div>
            </form>

        </div>

        <div class="button">

            <a href="Carga_Alumno2.php"><button
                    style="width: 110px;padding: 5px;border-color: #000000;border-radius: 5px;" class="boton"><i
                        class="fas fa-arrow-left"></i> Volver Atrás</button></a>
        </div>

    </div>

</body>

</html>


<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#cargaMaterias')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "registroInscripciones.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Error al cargar");
                } else {

                    alert("Agregado con exito");
                }
            }
        });
        //return false; //evita que se recargue y pierda los datos del form
    });

});
</script>