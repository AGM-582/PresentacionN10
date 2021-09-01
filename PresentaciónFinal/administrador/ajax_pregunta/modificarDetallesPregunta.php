<?php

include("../../conexion.php");

if (isset($_POST)) {
    // Obtener valores
    $id_pregunta    = $_POST['id_pregunta'];
    $titulo         = $_POST['titulo'];

    // Modificar producto
    $query = "
        UPDATE preguntas SET
        titulo  = '$titulo'
        WHERE id_pregunta   = '$id_pregunta'
    ";

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}