<?php
//date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'Spanish');
//saqué de acá, porque me estaba dejando estúpido: https://stackoverflow.com/questions/27450346/convert-to-capital-letter-the-day-and-month-names-using-php-strftime
$default_local_date = ucwords(utf8_encode(strftime('%e de %B de %Y')));//pasa todo a mayúsculas las primeras letas
$date_connectors_capital = array('De', 'Del');
$date_connectors_lower = array('de', 'del');//corrige los conectores
$Fecha_Automatica = str_replace($date_connectors_capital, $date_connectors_lower, $default_local_date);

require('FPDF/Diagrama.php');
require('../conexion.php'); #corregir las rutas falopas
$id_encuesta = $_GET['id_encuesta'];
//$_GET['id_encuesta'];
/* Consulta para extraer título y descripción de la encuesta*/
$query3 = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
$resultados3 = $con->query($query3);
$row3 = $resultados3->fetch_assoc();
$consulta = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
$resultados2 = $con->query($consulta);
$query_ID_profesor = "SELECT idProfesor 
					FROM materia
					WHERE id = $row3[id_materia]";

$resultado_id_profesor = $con->query($query_ID_profesor);
$row_id_profesor = $resultado_id_profesor->fetch_assoc();

$query_nombre_profesor = "SELECT nombre 
						FROM profesor 
						WHERE id = $row_id_profesor[idProfesor]";
$resultado_nombre_profesor = $con->query($query_nombre_profesor);
$row_nombre_profesor = $resultado_nombre_profesor->fetch_assoc();


//date('l d \of F Y')


/*ACÁ SE GENERA EL TEXTO QUE VA EN LA PRESENTACIÓN DEL RESULTADO*/
$file = fopen("textopredeterminado.txt", "w");
fwrite($file, "Posadas, $Fecha_Automatica \n\n

Apreciado/a Docente: $row_nombre_profesor[nombre]\n\n

Se presenta a continuación, la Valoración de la Tarea Docente del Primer Semestre 2021, correspondiente a su asignatura.\n\n

El mismo incluye, Fortalezas y Debilidades en cuanto a diferentes aspectos de la tarea docente. 
Se utilizó una escala de satisfacción para valorar las opiniones, que fueron:\n\n

* Muy bien\n
* Bien Regular\n
* Necesita mejorar.\n\n

El mismo quizás no refleje el esfuerzo y el desafio que ha representado para Ud. desarrollar las clases en forma virtual, pero a pesar de todo, ha demostrado su competencia.
En la seguridad de que los resultados serán para la mejora continua de su labor docente. \n");
fclose($file);
//////FIN DE LA PRESENTACIÓN//////

$pdf = new PDF_Diag();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 22.5);
#("ruta",posicion horizontal,posicion vertical,ancho,largo) config imagen
//$pdf->Image("..\Home_page\Normal10.png",0,0,50,50);
/*ACÁ SE AGREGA EL TEXTO PREDEFINIDO*/
$pdf->Cell(5,5,$pdf->ImprimirTexto('textopredeterminado.txt'),0,10);
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 20);
//este sería el nombre de la encuesta o título
$pdf->Cell(0, 5, utf8_decode($row3["titulo"]), 0, 15, 'C');
$pdf->Ln(8);
while ($row2 = $resultados2->fetch_assoc()) {
	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Ln(10);
	//título o nombre de la pregunta
	$pdf->Cell(0, 5, utf8_decode($row2["titulo"]), 0, 1); #esta es la pregunta
	$pdf->Ln(8);
	//$pdf->SetFont('Times', 'B', 11);
	$valX = $pdf->GetX();
	$valY = $pdf->GetY();
	$id_pregunta = $row2['id_pregunta'];
	$query = "SELECT preguntas.id_pregunta, preguntas.titulo,COUNT('preguntas.titulo') as count, opciones.valor 
			FROM opciones INNER JOIN preguntas ON opciones.id_pregunta=preguntas.id_pregunta
			INNER JOIN resultados ON opciones.id_opcion=resultados.id_opcion WHERE preguntas.id_pregunta = '$id_pregunta' GROUP BY opciones.valor
			ORDER BY preguntas.id_pregunta";
	$resultados = $con->query($query);
	/*TITULO*/
	$cantidades = array();
	$titulos = array();
	//$tamaño = array();
	$i = 1;
	while ($row = $resultados->fetch_assoc()) {
		$cantidades[$i] = 0;
		$cantidades[$i] = $row['count'];
		$titulos[$i] = utf8_decode($row['valor']);
		//opción y valor del lado izquierdo del pdf
		//innecesario, pero se agrega si quieren...
		//$pdf->Cell(30, 5, utf8_decode($titulos[$i]));
		//$pdf->Cell(-14, 12, utf8_decode("Votos: " . $cantidades[$i]), 0, 0, 'R');
		//$pdf->Ln(2);
		//$pdf->Ln(10);
		///////////////////
		$i++;
	}
	//data contiene strings y numeros, los strings hay que achicarlos o limitarlos usando:
	/*ACÁ IRÍA LA ACHICACIÓN */
	$data = array_combine($titulos, $cantidades);
	//acá se determina la posición horizontal del gráfico
	$pdf->SetXY(20, $valY);
	//randomizamos los colores
	$col1 = array(rand(1,85), rand(86,171), rand(172,255));
	$col2 = array(rand(172,255), rand(1,85), rand(86,171));
	$col3 = array(rand(86,171),rand(172,255),rand(1,85));
	//tamaño del gráfico es ancho primero y después alto junto con leyendas aparentemente
	$pdf->PieChart(150, 75, $data, '%l (%p)', array($col1, $col2, $col3));
	//acá se determina la posición vertical del gráfico, pero toma desde el segundo y no desde el primero
	$pdf->SetXY($valX, $valY + 45);
	$pdf->Ln(10);
	$opciones = $i - 1;
}
//Bar diagram
/*$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, '2 - Bar diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(255,175,100));
$pdf->SetXY($valX, $valY + 80);*/

$pdf->Output();