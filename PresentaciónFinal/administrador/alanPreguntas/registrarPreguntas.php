<?php


include("../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo']; //names de los inputs
$id_tipo_pregunta = $_POST['id_tipo_pregunta'];




$query = "INSERT INTO preguntas (id_encuesta,titulo,id_tipo_pregunta) VALUES('$id_encuesta', '$titulo','$id_tipo_pregunta')";

//$resultado = $con->query($query);
echo mysqli_query($con, $query);