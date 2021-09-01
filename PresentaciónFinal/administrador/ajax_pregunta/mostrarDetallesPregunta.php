<?php

include("../../conexion.php");

if (isset($_POST['id_pregunta']) && isset($_POST['id_pregunta']) != "") {
    // Obtener id_pregunta
    $id_pregunta = $_POST['id_pregunta'];

    // Obtener detalles de la pregunta
    $query = "SELECT * FROM preguntas WHERE id_pregunta = '$id_pregunta'" ;
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else {
        $response['status'] = 200;
        $response['message'] = "Información no encontrada!";
    }
    // display JSON data
    echo json_encode($response) ;
}
else {
    $response['status'] = 200;
    $response['message'] = "Consulta Invalida!";
}