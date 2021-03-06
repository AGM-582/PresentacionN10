<?php

session_start();
// Incluimos el archivo de conexión a base de datos
include("../../conexion.php");

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th width="100">Descripción</th>
                <th>Estado</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Acciones</th>
            </tr>
        </thead>';

if ($_SESSION["tipo_usuario"] == 1) {
    $query = "SELECT * FROM encuestas WHERE id_carrera = '$_SESSION[carrera]'  ORDER BY id_encuesta DESC";
} else if ($_SESSION["tipo_usuario"] == 3) {
    $query = "SELECT * FROM encuestas ORDER BY id_encuesta DESC";
}
$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $estado = '';
    if ($row["estado"] == 1) {
        $estado = 'Pública';
    } else {
        $estado = 'Oculta';
    }
    $data .= '
        <tbody>
            <tr>
                <td><a href="mostrar_preguntas.php?id_encuesta=' . $row['id_encuesta'] . '">' . $row['titulo'] . '</a></td>
                <td width="100">' . mb_strimwidth($row["descripcion"], 0, 30, "...") . '</td>
                <td>' . $estado . '</td>
                <td>' . $row["fecha_inicio"] . '</td>
                <td>' . $row["fecha_final"] . '</td>
                <td>
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button onclick="obtenerDetallesEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn btn-warning">Modificar</button>



                        <a class="dropdown-item btn btn-secondary" href="mostrar_preguntas.php?id_encuesta=' . $row['id_encuesta'] . '">Agregar Preguntas</a>



                        <button onclick="eliminarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn btn-danger">Eliminar</button>
                        <button onclick="publicarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn btn-primary">Publicar</button>
                        <button onclick="finalizarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn btn-secondary">Finalizar</button>

                        <a class="dropdown-item btn btn-secondary" href="vista_previa.php?id_encuesta=' . $row['id_encuesta'] . '">Vista Previa</a>

                        <a class="dropdown-item btn btn-secondary" target="_blank" href="reporte.php?id_encuesta=' . $row['id_encuesta'] . '">Resultados</a>
                    </div>
                </td>
            </tr>
        </tbody>';
}


$data .= '</table>';

echo $data;