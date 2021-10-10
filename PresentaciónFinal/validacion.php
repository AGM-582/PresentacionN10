<?php

session_start();

$id_usuario = $_POST['id_usuario'];
echo $id_usuario;
$clave 	= $_POST['clave'];
echo $clave;
include("conexion.php");

$query_usuario = "SELECT * FROM usuarios WHERE correo = '$id_usuario' AND dni = '$clave'";
$resultado_usuario = $con->query($query_usuario);

if ($row_usuario = $resultado_usuario->fetch_assoc()) {

	if ($row_usuario['id_tipo_usuario'] == '1') {

		$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
		$_SESSION['u_usuario'] = $row_usuario['nombre_completo'];
		$_SESSION['carrera'] = $row_usuario['carrera'];

		header("Location: Menu/menu.php");
	} else if ($row_usuario['id_tipo_usuario'] == '2') {

		$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
		$_SESSION['u_usuario'] = $row_usuario['nombre_completo'];

		header("Location: usuario/index.php");
	}
} else {
	header("Location: login.php");
}


if (!$query_usuario) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}
