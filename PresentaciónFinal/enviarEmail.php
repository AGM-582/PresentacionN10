<?php

$destino = "mejorizarservicios@gmail.com";
$nombre = $_POST['Nombre'];
$correo = $_POST['Correo'];
$celular = $_POST['Celular'];
$asunto = $_POST['Asunto'];
$mensaje = $_POST['Mensaje'];
$header = "From: " . $correo . "\r\n";
$header .= "Reply-To: " . $correo . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion();

echo mail($destino, $asunto, $mensaje, $header);