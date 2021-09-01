<?php
include('../../conexion.php');

$idCarrera = $_POST['idCarrera'];
$idAlumno = $_POST['idAlumno'];

if (isset($_POST['enviar'])) {
    $materias = $_POST['materia'];
    //var_dump($materias);
    if (!empty($materias)) {
        foreach ($materias as $materia) {

            $query = "INSERT INTO inscripciones (idCarrera,idMateria,idAlumno) VALUES('$idCarrera', '$materia','$idAlumno')";
            echo mysqli_query($con, $query);
            header("Location: materiasAlumno.php");

            //}
        }
    }
}