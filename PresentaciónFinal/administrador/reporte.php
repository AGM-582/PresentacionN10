<?php
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

$pdf = new PDF_Diag();
$pdf->AddPage();
$pdf->SetFont('Courier', 'B', 20);
//$pdf->Image();#("ruta",posicion horizontal,posicion vertical,ancho,largo)
$pdf->Cell(0, 5, utf8_decode($row3["titulo"]), 0, 1, 'C'); #utf8_decode acentos y eñes
$pdf->Ln(8);

while ($row2 = $resultados2->fetch_assoc()) {

	$pdf->SetFont('Arial', 'BIU', 12);
	//$pdf->Image();#("ruta",posicion horizontal,posicion vertical,ancho,largo)
	$pdf->Cell(0, 5, utf8_decode($row2["titulo"]), 0, 1); #utf8_decode acentos y eñes
	$pdf->Ln(8);
	$pdf->SetFont('Arial', '', 10);
	$valX = $pdf->GetX();
	$valY = $pdf->GetY();

	$id_pregunta = $row2['id_pregunta'];

	$query = "SELECT preguntas.id_pregunta, preguntas.titulo,COUNT('preguntas.titulo') as count, opciones.valor FROM opciones INNER JOIN preguntas ON opciones.id_pregunta=preguntas.id_pregunta INNER JOIN resultados ON opciones.id_opcion=resultados.id_opcion WHERE preguntas.id_pregunta = '$id_pregunta' GROUP BY opciones.valor ORDER BY preguntas.id_pregunta";
	$resultados = $con->query($query);

	/*TITULO*/
	$cantidades = array();
	$titulos = array();
	$tamaño = array();
	$i = 1;
	while ($row = $resultados->fetch_assoc()) {
		$cantidades[$i] = 0;
		$cantidades[$i] = $row['count'];
		$titulos[$i] = $row['valor'];


		//Pie chart
		/*armar un foreach para iterar entre preguntas
		y que cada pregunta tenga sus gráficos*/
		//$pdf->AddPage();


		//foreach ($data as $dato) {
		$pdf->Cell(40, 5, utf8_decode($titulos[$i]));
		$pdf->Cell(15, 5, utf8_decode("Votos: " . $cantidades[$i]), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Ln(8);
		//}
		/*$pdf->Cell(30, 5, utf8_decode('llave como texto'));
		$pdf->Cell(15, 5, utf8_decode($data['llave como texto']), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(30, 5, utf8_decode('otra respuesta'));
		$pdf->Cell(15, 5, utf8_decode($data['llave1']), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(30, 5, utf8_decode('mas respuestas'));
		$pdf->Cell(15, 5, utf8_decode($data['llave2']), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Ln(8);*/


		$i++;
	}
	$data = array_combine($titulos, $cantidades);
	$pdf->SetXY(90, $valY);
	$col1 = array(100, 100, 255);
	$col2 = array(255, 100, 100);
	$col3 = array(255, 255, 100);
	$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2, $col3));
	$pdf->SetXY($valX, $valY + 40);
	$opciones = $i - 1;
}
//consulta

/*de la tabla resultados, necesito el total de cada opcion segun cada pregunta de cada encuesta
de la tabla encuestas necesito el estado, id_encuesta, titulo y descripcion
de la tabla opciones, necesito el id de opcion segun la pregunta y su valor que serian las respuestas
o sea que hay que filtrar 3 tablas para sacar los gráficos del re mil ogt
$consulta="SELECT tenc.estado,tenc.id_encuesta,tenc.titulo,tenc.descripcion
,res.total,res.id_opcion,res.id_encuesta
,op.id_opcion,op.valor,op.id_pregunta
FROM encuestas AS tenc INNER JOIN opciones AS op INNER JOIN resultados AS res ON tenc.estado=1 AND res.id_encuesta";
$traeme = $con->query($consulta);*/

//fin consulta



//$data = array();
/*while($algo = mysql_fetch_array($resultados)){
    $data[$algo['month']] = $algo['salary'];
}*/


//$n de donde chota saco eso martín? jajajja hdrmp
/*For ($i = 0; $i<=$n; $i++){ 
    $data[$i] = [$titulos[$i] => $cantidades[$i]];
}*/


//Bar diagram
/*$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, '2 - Bar diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(255,175,100));
$pdf->SetXY($valX, $valY + 80);*/

$pdf->Output();