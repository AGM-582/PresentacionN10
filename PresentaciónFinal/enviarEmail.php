<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    mail($destino, $asunto, $mensaje, $header);
    header("Location: contactanos.php");
    ?>
</body>

</html>