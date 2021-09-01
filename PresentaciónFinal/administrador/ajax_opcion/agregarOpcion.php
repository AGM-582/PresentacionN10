<?php

if (isset($_POST['id_pregunta']) && isset($_POST['valor'])) {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener valores
    $id_pregunta     = $_POST['id_pregunta'];
    $valor 			 = $_POST['valor'];

    $query = "INSERT INTO opciones (id_pregunta, valor)
              VALUES ('$id_pregunta', '$valor')";

    $resultado = $con->query($query);

}
