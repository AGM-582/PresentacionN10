<?php

session_start();

$id_usuario = $_POST['id_usuario'];
echo $id_usuario;
$clave 	= $_POST['clave'];
echo $clave;
include("conexion.php");

$query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' AND clave = '$clave'";
$resultado = $con->query($query);

$query2 = "SELECT * FROM alumno WHERE id = '$id_usuario' AND usuario = '$clave'";
$resultado2 = $con->query($query2);



if ($row = $resultado->fetch_assoc()) {


	if ($row['id_tipo_usuario'] == '1') {
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['u_usuario'] = $row['nombres'];
		header("Location: Menu/menu.php");
	}
} else if ($row2 = $resultado2->fetch_assoc()) {
	$_SESSION['id_usuario'] = $row2['id'];
	$_SESSION['u_usuario'] = $row2['nombre'];
	header("Location: usuario/index.php");
} else {
	header("Location: index.php");
}

if (!$query) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}