<?php
include '../../conexion.php';
$carrera = $_POST['carrera'];


$query4 = "SELECT  carrera.nombre,carrera.duracionAnios 
FROM carrera
WHERE carrera.id = '$carrera'";
$respuesta4 = $con->query($query4);
$row4 = mysqli_fetch_array($respuesta4);

$query3 = "SELECT materia.id, materia.idCarrera, materia.nombre, materia.anio 
		FROM materia
		WHERE materia.idCarrera = '$carrera'";
$respuesta3 = $con->query($query3);
//$row3 = mysqli_fetch_array($respuesta3);

/*////////////////////////////////////////////////////////////////////////////////////////////////////*/


$i = 1;
$siguienteAnio = 0;
while (($row3 = $respuesta3->fetch_assoc())) {
    //este if sirve para escribir los años arriba del listado de materias
    if ($row3['anio'] > $siguienteAnio) {
        //echo '<br>';
        echo '<b>' . $row3['anio'] . 'º AÑO: </b>';
    }


    $materias = '<div class="radio">
                            <label><input class="form-check-input" type="checkbox" name="materia[]"
                                    value=' . $row3['id'] . '>' .
        $row3['nombre'] . '</input></label>
                        </div>';

    $siguienteAnio = $row3['anio'];
    echo $materias;
}
$i++;