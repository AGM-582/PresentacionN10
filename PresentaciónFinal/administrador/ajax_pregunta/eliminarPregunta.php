<?php
// Validar consulta
if (isset($_POST['id_pregunta']) && isset($_POST['id_pregunta']) != "") {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener id_pregunta
    $id_pregunta = $_POST['id_pregunta'];

    // Eliminar encuesta
    $query = "DELETE FROM preguntas WHERE id_pregunta = '$id_pregunta'";
    $resultado = $con->query($query);
}
