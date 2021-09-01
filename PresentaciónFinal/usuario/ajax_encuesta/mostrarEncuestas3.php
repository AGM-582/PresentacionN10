<?php

// Incluimos el archivo de conexión a base de datos
include ("../../conexion.php");

$query = "SELECT * FROM encuestas WHERE estado = '1'";
$resultado = $con->query($query);
$tamaño = $resultado->num_rows;

$data = "";

if ($tamaño == 0) {
    $data .= "No hay encuestas disponibles";
} elseif ($tamaño > 0) {

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Final</th>
                <th>Accciones</th>
            </tr>
        </thead>';

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                <td>' . $row['titulo'] . '</td>
                <td>' . $row["descripcion"] . '</td>
                <td>' . $row["fecha_final"] . '</td>
                <td>
                    <a class="btn btn-primary" href="responder.php?id_encuesta=' . $row['id_encuesta'] . '">Responder</a>
                </td>
            </tr>
        </tbody>';
}


$data .= '</table>';

}

echo $data;