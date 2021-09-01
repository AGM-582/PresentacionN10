<?php


include("../../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');

$nombre = $_POST['nombre'];
$duracion = $_POST['duracion']; //names de los inputs
//$escuela = $_POST['idEscuela'];
//$escuela = (int)$esc;




$query = "INSERT INTO carrera (nombre,duracionAnios) VALUES('$nombre','$duracion')";

//$resultado = $con->query($query);
echo mysqli_query($con, $query);

    //header("Location: Menu/Carga_Alumno/Carga_Alumno.php");