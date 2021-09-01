<?php
// Validar consulta
if (isset($_POST['id_opcion']) && isset($_POST['id_opcion']) != "") {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener id_opcion
    $id_opcion = $_POST['id_opcion'];

    // Eliminar encuesta
    $query = "DELETE FROM opciones WHERE id_opcion = '$id_opcion'";
    $resultado = $con->query($query);
}
