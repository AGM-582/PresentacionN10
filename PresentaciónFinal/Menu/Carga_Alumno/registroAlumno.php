<?php

include("../../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');

$nombre = $_POST['nombre']; //names de los inputs
$dni = $_POST['dni'];
//$correo = $_POST['correo'];
//$escuela = $_POST['escuela'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];
$tipoUsuario = '2';
// $sexo = $_POST['sexo'];

echo $nombre;
$query = "INSERT INTO usuarios (nombre_completo,dni,id_carrera,correo,id_tipo_usuario) VALUES('$nombre', '$dni','$carrera','$correo','$tipoUsuario')";

//$resultado = $con->query($query);
echo mysqli_query($con, $query);
