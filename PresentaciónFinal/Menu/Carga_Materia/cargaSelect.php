<?php
include '../../conexion.php';
$carrera = $_POST['carrera'];

$query = $con->query("SELECT * FROM carrera WHERE id='$carrera'");

//Select con un bucle for que selecciona los años dependiendo de la carrera
while ($datos = mysqli_fetch_array($query)) {
    $cadena = "<span class='details'>Año:</span>
<select id='anio' name='anio'>";

    for ($i = 1; $i <= $datos[2]; $i++) {

        $cadena = $cadena . '<option value=' . $i . '>' . utf8_encode($i) . '</option>';
    }

    echo $cadena . "</select>";
}