<?php

include("../../conexion.php");
//$conexion = mysqli_connect('localhost', 'root', '', 'sistema_encuestasv1');




/*************inscripcion del alumno como usuario*********************************** */

$nombre = $_POST['nombre']; //names de los inputs
$dni = $_POST['dni'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];
$tipoUsuario = '2';


echo "este es el id carrera: " . $carrera . "espacio ";
/*echo $nombre;*/
$query2 = "INSERT INTO usuarios (nombre_completo,dni,id_carrera,correo,id_tipo_usuario) VALUES('$nombre', $dni,$carrera,'$correo',$tipoUsuario)";
mysqli_query($con, $query2);


//$resultado = $con->query($query);

/*************************************inscripciones a materias****************************************** */

$query_materias = "SELECT id_usuario FROM usuarios ORDER BY id_usuario DESC LIMIT 1";

$resultado_usuario = $con->query($query_materias);
$row_usuarios = mysqli_fetch_array($resultado_usuario);

$idAlumno = $row_usuarios[0];
//$idAlumno = $idAlumno + 1;
//echo "este es el id alumno: " . $idAlumno;

$materias = $_POST['materia'];
//var_dump($materias);
if (!empty($materias)) {
    foreach ($materias as $materia) {
        //echo $materia;
        $query = "INSERT INTO inscripciones (idCarrera,idMateria,idAlumno) VALUES($carrera, $materia,$idAlumno)";
        echo mysqli_query($con, $query);
        header("Location: Carga_Alumno.php");
    }
}