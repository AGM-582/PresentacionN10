<?php

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
