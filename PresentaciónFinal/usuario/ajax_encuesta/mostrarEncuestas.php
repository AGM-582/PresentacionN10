<?php

// Incluimos el archivo de conexión a base de datos
include("../../conexion.php");
session_start();
//include("../../validacion.php");

//$idAlumno = $_POST['idAlumno'];
//$id_usuario = $_POST['id_usuario'];

$query2 = "SELECT idMateria FROM inscripciones WHERE idAlumno = '$_SESSION[id_usuario]'";
$resultado2 = $con->query($query2);
$Array_Materias = array();

while ($row = mysqli_fetch_array($resultado2)) {
    array_push($Array_Materias, $row[0]);
}
$query = "SELECT * FROM encuestas WHERE estado = '1' AND id_materia IN (";
$B = true;
foreach ($Array_Materias as $Materia) {
    if ($B) {
        $B = false;
        $query .= "$Materia";
        continue;
    }
    $query .= ", $Materia";
}
$query .= ")";
$resultado = $con->query($query);
$tamaño = $resultado->num_rows;

//********COMENTO LO QUE HICE...LO QUE ESTA FUNCIONANDO AHORA ES EL CODIGO ORIGINAL***************************************

//SELECCIONO DATOS DE INSCRIPCIONES DEPENDIENDO DEL ID ALUMNO
/*$query4 = "SELECT inscripciones.idCarrera,inscripciones.idMateria,inscripciones.idAlumno  FROM inscripciones WHERE idAlumno = '2'";
$respuesta4 = $con->query($query4);
$row4 = $respuesta4->fetch_assoc();
//$row4 = mysqli_fetch_array($respuesta4);
$idCarreraIns = (int)$row4['idCarrera'];
$idMateriaIns = (int)$row4['idMateria'];
$idAlumnoIns = (int)$row4['idAlumno'];

//SELECCIONO ENCUESTA DEPENDIENDO DE LOS ID CARRERA Y MATERIA DE INSCRIPCIONES
$query = "SELECT * FROM encuestas WHERE id_carrera = '$idCarreraIns' AND id_materia = '$idMateriaIns' AND estado = '1'";
$resultado = $con->query($query);
$tamaño = $resultado->num_rows;*/

$data = "";

if ($tamaño == 0) {
    $data .= "No hay encuestas disponibles";
} elseif ($tamaño > 0) {

    // Diseñamos el encabezado de la tabla
    $data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Final</th>
                <th>Acciones</th>
            </tr>
        </thead>';

    $i = 1;
    while ($row = $resultado->fetch_assoc()) {
        $data .= '
        <tbody>
            <tr>
                <td>' . $row['titulo'] . '</td>
                <td>' . $row["descripcion"] . '</td>
                <td>' . $row["fecha_final"] . '</td>
                <td>
                    <a class="btn btn-primary" href="responder.php?id_encuesta=' . $row['id_encuesta'] . '">Responder</a>
                </td>
            </tr>
        </tbody>';
    }

    $i++;
    $data .= '</table>';
}

echo $data;