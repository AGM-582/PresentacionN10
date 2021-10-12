<?php
session_start();
/* if (isset($_SESSION['u_usuario']) && isset($_SESSION['id_usuario'])) {
    header("Location: ../index.php");
  
}*/

require "../conexion.php";
$id_encuesta = $_GET['id_encuesta'];
$query2 = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
$respuesta2 = $con->query($query2);
$query3 = "SELECT encuestas.titulo, encuestas.descripcion, preguntas.id_pregunta, preguntas.id_encuesta, preguntas.id_tipo_pregunta 
		FROM preguntas
		INNER JOIN encuestas
		ON preguntas.id_encuesta = encuestas.id_encuesta
		WHERE preguntas.id_encuesta = '$id_encuesta'";
$respuesta3 = $con->query($query3);
$row3 = $respuesta3->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/Logo-fis.png">
    <title>Responder</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--NAVBAR-->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0" style="color: #fff">
                <?php

                echo "Bienvenido " . $_SESSION['u_usuario'] . "\t";
                echo "<a href='../cerrar_sesion.php' class='btn btn-danger' style='margin-left: 10px'>Cerrar Sesión</a>";
                ?>
            </form>
        </div>
    </nav>
    <center>
        <div class="container">
            <hr />
            <h1><?php echo $row3['titulo'] ?></h1>
            <p><?php echo $row3['descripcion'] ?></p>
            <form action="procesar.php" method="Post" autocomplete="off">
                <input type="hidden" id="id_encuesta" name="id_encuesta" value="<?php echo $id_encuesta ?>" />
                <hr />
                <?php
                $i = 1;
                while (($row2 = $respuesta2->fetch_assoc())) {
                    $id = $row2['id_pregunta'];
                    $query = "SELECT preguntas.id_pregunta, preguntas.titulo, preguntas.id_tipo_pregunta, opciones.id_opcion, opciones.valor
                    FROM opciones
                    INNER JOIN preguntas
                    ON preguntas.id_pregunta = opciones.id_pregunta
                    WHERE preguntas.id_pregunta = $id
                    ORDER BY opciones.id_pregunta, opciones.id_opcion";
                    $respuesta = $con->query($query);
                ?>
                <h4 class="col-form-lg"><?php echo "$i. " . $row2['titulo'] ?></h4>
                <?php //se agrega al bucle el resto de las opciones con su respectivo tipo
                    while (($row = $respuesta->fetch_assoc())) {
                        if ($row['id_tipo_pregunta'] == 1) {
                    ?><div>
                    <label><input class="form-check-input" type="radio" name="<?php echo $row['id_pregunta'] ?>"
                            value="<?php echo $row['id_opcion'] ?>" required>
                        <?php echo $row['valor'] ?></label>
                </div><?php
                                } elseif ($row['id_tipo_pregunta'] == 3) {
                                    ?>
                <div class="form-check form-check-inline">
                    <label><input class="form-check-input" type="checkbox" name="<?php echo $row['id_pregunta'] ?>[]"
                            value="<?php echo $row['id_opcion'] ?>">
                        <?php echo $row['valor'] ?></label>
                </div><?php
                                } elseif ($row['id_tipo_pregunta'] == 4) {
                                    ?>
                <div>
                    <input type="hidden" name="<?php echo $row['id_pregunta'] ?>[]" value="text_flag">
                    <input type="hidden" name="<?php echo $row['id_pregunta'] ?>[]"
                        value="<?php echo $row['id_opcion'] ?>">
                    <label>
                        <textarea class="col-auto" id="comentarios" name="<?php echo $row['id_pregunta'] ?>[]" value=""
                            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'
                            style="resize:none">
                                                </textarea><br>
                    </label>
                </div>
                <?php
                                }
                        ?>
                <?php
                    }
                    $i++;
                }
                ?>
                <br />
                <input type="hidden" name="id_encuesta" value="<?php echo $id_encuesta ?>">
                <input class="btn btn-primary" type="submit" value="Responder">
            </form>
            <a href="index.php" class="btn btn-primary">Regresar</a>
        </div>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>