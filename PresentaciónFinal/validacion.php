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
		$_SESSION['carrera'] = $row_usuario['id_carrera'];
		$_SESSION['tipo_usuario'] = $row_usuario['id_tipo_usuario'];

		echo mysqli_query($con, $row_usuario['id_tipo_usuario']);
		/*header("Location: Menu/menu.php");*/
	} else if ($row_usuario['id_tipo_usuario'] == '2') {

		$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
		$_SESSION['u_usuario'] = $row_usuario['nombre_completo'];
		$_SESSION['tipo_usuario'] = $row_usuario['id_tipo_usuario'];

		echo mysqli_query($con, $row_usuario['id_tipo_usuario']);

		/*header("Location: usuario/index.php");*/
	}
} else {
	/*header("Location: login.php");*/
	echo 0;
}


if (!$query_usuario) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}
