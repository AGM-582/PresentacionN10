<?php 

	include "../../conexion.php";
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$date = new DateTime();

	$fecha_comparacion = $date->format('Y-m-d H:i:s');
	$fecha_comparacion = strtotime(date("Y-m-d H:i:s", time()));
	echo $fecha_comparacion;
	echo "<br/>";

	$query = "SELECT * FROM encuestas";
	$resultado = $con->query($query);
	$tamaño = $resultado->num_rows;


	for ($i = 0; $i < $tamaño; $i++) { 
		if ($row = $resultado->fetch_assoc()) {
			$fecha_final = strtotime($row['fecha_final']);
			$id_encuesta = $row['id_encuesta'];
			echo "<br/>";
			echo $fecha_final;
		}

		if ($fecha_comparacion > $fecha_final) {
			$query2 = "UPDATE encuestas SET estado = '0' WHERE id_encuesta = '$id_encuesta'";
			$resultado2 = $con->query($query2);
			if ($resultado2) {
				echo "<br/>";
				echo "Estado Actualizado";
			}
		}
	}

 ?>