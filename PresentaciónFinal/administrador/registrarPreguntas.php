<?php


include("../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo']; //names de los inputs
$id_tipo_pregunta = $_POST['id_tipo_pregunta'];

switch ($id_tipo_pregunta) {
        // Caso Radio
    case 1:
        // Insert de la Pregunta
        $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
              VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
        echo mysqli_query($con, $query);


        //Select del id de la Pregunta que se acaba de cargar
        $query_id_pregunta = "SELECT `AUTO_INCREMENT`
                          FROM  INFORMATION_SCHEMA.TABLES
                          WHERE TABLE_SCHEMA = 'sistema_encuestasv1'
                          AND   TABLE_NAME   = 'preguntas'";

        $resultado_id_pregunta = mysqli_query($con, $query_id_pregunta);

        $id_pregunta_cargada = $resultado_id_pregunta->fetch_array();

        $id_pregunta_cargada[0] -= 1;

        //Insert de las Respuestas Default
        $query_cargar_default_radio = "INSERT INTO opciones (id_pregunta, valor) 
                                        VALUES ('$id_pregunta_cargada[0]', 'Muy Bien'),
                                                ('$id_pregunta_cargada[0]', 'Bien'),
                                                ('$id_pregunta_cargada[0]', 'Regular'),
                                                ('$id_pregunta_cargada[0]', 'Necesita Mejorar');";

        $resultado_cargar_default_radio = mysqli_query($con, $query_cargar_default_radio);
        break;
        //Caso Texto
    case 4:
        // Insert de la Pregunta
        $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
              VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
        echo mysqli_query($con, $query);


        //Select del id de la Pregunta que se acaba de cargar
        $query_id_pregunta = "SELECT `AUTO_INCREMENT`
                          FROM  INFORMATION_SCHEMA.TABLES
                          WHERE TABLE_SCHEMA = 'sistema_encuestasv1'
                          AND   TABLE_NAME   = 'preguntas'";

        $resultado_id_pregunta = mysqli_query($con, $query_id_pregunta);

        $id_pregunta_cargada = $resultado_id_pregunta->fetch_array();

        $id_pregunta_cargada[0] -= 1;

        //Insert de la Respuesta para Mostrar el Texto
        $query_cargar_default_texto = "INSERT INTO opciones (id_pregunta, valor) 
                                   VALUES ('$id_pregunta_cargada[0]', 'Texto_Index')";

        $resultado_cargar_default_texto = mysqli_query($con, $query_cargar_default_texto);
        break;
        // Caso Normal
    default:
        $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
              VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
        echo mysqli_query($con, $query);
        break;
}

//$resultado = $con->query($query);
