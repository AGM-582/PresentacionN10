<?php

// Incluimos el archivo de conexión a base de datos
include("../../conexion.php");

if (isset($_POST['id_encuesta'])) {
    $id_encuesta = $_POST['id_encuesta'];
}

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>ID Pregunta</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>';

$query = "SELECT preguntas.id_pregunta, preguntas.id_encuesta, preguntas.titulo, tipo_pregunta.nombre
            FROM preguntas
            INNER JOIN tipo_pregunta
            ON preguntas.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta
            WHERE preguntas.id_encuesta = '$id_encuesta'";

$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                <td>' . $row["id_pregunta"] . '</td>
                <td><a href="mostrar_opciones.php?id_pregunta=' . $row['id_pregunta'] . '&id_encuesta=' . $row['id_encuesta'] . '">' . $row['titulo'] . '</a></td>
                <td>' . $row["nombre"] . '</td>
                <td>
                    <a class="btn btn-primary" href="mostrar_opciones.php?id_pregunta=' . $row['id_pregunta'] . '&id_encuesta=' . $row['id_encuesta'] . '" role="button">Agregar Opción</a>
                    <button onclick="obtenerDetallesPregunta(' . $row['id_pregunta'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarPregunta(' . $row['id_pregunta'] . ')" class="btn btn-danger">Eliminar</button>
                    
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
