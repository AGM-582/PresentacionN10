<?php

if (isset($_POST['id_encuesta']) && isset($_POST['titulo']) && isset($_POST['id_tipo_pregunta'])) {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener valores
    $id_encuesta         = $_POST['id_encuesta'];
    $titulo             = $_POST['titulo'];
    $id_tipo_pregunta     = $_POST['id_tipo_pregunta'];

    //Switch para integrar los valores default
    switch ($id_tipo_pregunta) {
            // Caso Radio
        case 1:
            // Insert de la Pregunta
            $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
                      VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
            $resultado = $con->query($query);

            //Select del id de la Pregunta que se acaba de cargar
            $query_id_pregunta = "SELECT `AUTO_INCREMENT`
                                  FROM  INFORMATION_SCHEMA.TABLES
                                  WHERE TABLE_SCHEMA = 'sistema_encuestasv1'
                                  AND   TABLE_NAME   = 'preguntas'";

            $resultado_id_pregunta = $con->query($query_id_pregunta);

            $id_pregunta_cargada = $resultado_id_pregunta->fetch_array();

            //Insert de las Respuestas Default
            $query_cargar_default_radio = "INSERT INTO opciones (id_pregunta, valor) 
                                           VALUES ($id_pregunta_cargada[0], 'Muy Bien'),
                                                  ($id_pregunta_cargada[0], 'Bien'),
                                                  ($id_pregunta_cargada[0], 'Regular'),
                                                  ($id_pregunta_cargada[0], 'Necesita Mejorar')";

            $resultado_cargar_default_radio = $con->query($query_cargar_default_radio);
            break;
            //Caso Texto
        case 4:
            // Insert de la Pregunta
            $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
                      VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
            $resultado = $con->query($query);

            //Select del id de la Pregunta que se acaba de cargar
            $query_id_pregunta = "SELECT `AUTO_INCREMENT`
                                  FROM  INFORMATION_SCHEMA.TABLES
                                  WHERE TABLE_SCHEMA = 'sistema_encuestasv1'
                                  AND   TABLE_NAME   = 'preguntas'";

            $resultado_id_pregunta = $con->query($query_id_pregunta);

            $id_pregunta_cargada = $resultado_id_pregunta->fetch_array();

            //Insert de la Respuesta para Mostrar el Texto
            $query_cargar_default_texto = "INSERT INTO opciones (id_pregunta, valor) 
                                           VALUES ($id_pregunta_cargada[0], '80')";

            $resultado_cargar_default_texto = $con->query($query_cargar_default_texto);
            break;
            // Caso Normal
        default:
            $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
                      VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";
            break;
    }
}
