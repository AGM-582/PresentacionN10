<?php


// Incluir archivo de conexión a base de datos
include("../../conexion.php");


// Establecemos la zona horario
date_default_timezone_get();
$date = new DateTime();
$fecha_inicio = $date->format('Y-m-d H:i:s');

// Obtener valores
$id_usuario  = $_POST['id_usuario'];
$titulo      = $_POST['titulo'];
$carrera      = $_POST['carrera'];
$materia      = $_POST['materia'];
$descripcion = $_POST['descripcion'];
$fecha_final = $_POST['fecha_final'];

$query = "INSERT INTO encuestas (id_usuario, titulo, id_carrera, id_materia, descripcion, estado, fecha_inicio, fecha_final) VALUES ('$id_usuario', '$titulo','$carrera', '$materia','$descripcion', '0', '$fecha_inicio', '$fecha_final')";

$resultado = $con->query($query);