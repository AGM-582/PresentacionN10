<?php

// Incluimos el archivo de conexión a base de datos
include("../../conexion.php");

if (isset($_POST['id_pregunta'])) {
    $id_pregunta = $_POST['id_pregunta'];
}

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>ID opción</th>
                <th>ID pregunta</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>';

$query = "SELECT * FROM opciones WHERE id_pregunta = '$id_pregunta'";

$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                <td>' . $row["id_opcion"] . '</td>
                <td>' . $row["id_pregunta"] . '</td>
                <td>' . $row["valor"] . '</td>
                <td>
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;