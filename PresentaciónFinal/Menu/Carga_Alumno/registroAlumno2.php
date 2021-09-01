<?php

include("../../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');

$nombre = $_POST['nombre']; //names de los inputs
$dni = $_POST['dni'];
//$correo = $_POST['correo'];
//$escuela = $_POST['escuela'];
$carrera = $_POST['carrera'];
$usuario = $_POST['usuario'];
$anio = $_POST['anio'];
$tipoUsuario = '2';
// $sexo = $_POST['sexo'];

echo $nombre;
$query = "INSERT INTO alumno (nombre,dni,carrera,usuario,anio,idTipoUsuario) VALUES('$nombre', '$dni','$carrera','$usuario','$anio','$tipoUsuario')";

//$resultado = $con->query($query);
echo mysqli_query($con, $query);