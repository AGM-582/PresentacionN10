<?php
require('C:\wamp64\www\ProgresoMayo25\administrador\FPDF\Diagrama.php');
require('C:\wamp64\www\ProgresoMayo25\conexion.php'); #corregir las rutas falopas
$id_encuesta = 3;
//$_GET['id_encuesta'];

/* Consulta para extraer título y descripción de la encuesta*/
$query3 = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
$resultados3 = $con->query($query3);
$row3 = $resultados3->fetch_assoc();
$consulta = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
$resultados2 = $con->query($consulta);

while ($row2 = $resultados2->fetch_assoc()) {

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
		$i++;
	}

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

$pdf = new PDF_Diag();
$pdf->AddPage();

$data = array($titulos[0] => $cantidades[0], $titulos[0] => $cantidades[0], $titulos[0] => $cantidades[0]);
var_dump($data);
//$titulos[$i]

//Pie chart
/*armar un foreach de cada pregunta según encuesta*/
//$pdf->AddPage();
$pdf->SetFont('Arial', 'BIU', 12);
//$pdf->Image();#("ruta",posicion horizontal,posicion vertical,ancho,largo)
$pdf->Cell(0, 5, utf8_decode('blablabla'), 0, 1); #utf8_decode acentos y eñes
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 10);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Cell(30, 5, utf8_decode('alcaucil'));
$pdf->Cell(15, 5, utf8_decode($data['tumina']), 0, 0, 'R');
//[$titulos[$i]]
$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('otra respuesta'));
$pdf->Cell(15, 5, utf8_decode($data['otra respuesta']), 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('mas respuestas'));
$pdf->Cell(15, 5, utf8_decode($data['mas respuestas']), 0, 0, 'R');
$pdf->Ln();
$pdf->Ln(8);

$pdf->SetXY(90, $valY);
$col1 = array(100, 100, 255);
$col2 = array(255, 100, 100);
$col3 = array(255, 255, 100);
$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1, $col2, $col3));
$pdf->SetXY($valX, $valY + 40);

//Bar diagram
/*$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, '2 - Bar diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(255,175,100));
$pdf->SetXY($valX, $valY + 80);*/

$pdf->Output();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
	require "FPDF/fpdf.php";

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../M-ByTailorBrands.png', 5, 5, 20 );

			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Usuarios',0,0,'C');
			$this->Ln(20);
		}

		
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	//Agregamos la libreria FPDF
	require('../conexion.php');

	$query = "SELECT * FROM usuarios";
	$resultado = $con->query($query);

	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,utf8_decode('Código'),1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('Clave'),1,0,'C',1);
	$pdf->Cell(30,6,'Nombres',1,0,'C',1);
	$pdf->Cell(50,6,'Apellidos',1,0,'C',1);
	$pdf->Cell(50,6,'Correo',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['id_usuario']),1,0,'C');
		$pdf->Cell(20,6,$row['clave'],1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['nombres']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['apellidos']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['email']),1,1,'C');
	}
	
	$pdf->Output();
*/