<?php


include("../../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');

$nombre = $_POST['nombre']; //names de los inputs
$legajo = $_POST['legajo'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];



$query = "INSERT INTO profesor (nombre,legajo,correo,telefono) VALUES('$nombre', '$legajo','$correo','$telefono')";

//$resultado = $con->query($query);
echo mysqli_query($con, $query);

    //header("Location: Menu/Carga_Alumno/Carga_Alumno.php");