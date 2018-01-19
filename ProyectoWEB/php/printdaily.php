<?php
require("pdfjs.php");
date_default_timezone_set('America/Bogota');
extract($_POST);

/********************* CONSTRUIMOS LA FACTURA **********************************/
$pdf = new PDF_AutoPrint();
$pdf->SetFont('courier','',8);
$pdf->SetAutoPageBreak(true, 1);
$pdf->SetLeftMargin(1);
$pdf->SetTopMargin(2);
$pdf->AddPage('P', array(78,78));

$pdf->SetFont('Courier', 'B', 16);
$pdf->Cell(18,4,"",0);
$pdf->Cell(0,4,"PARQUEADERO",0);
$pdf->Ln(5);
$pdf->SetFont('Courier', 'B', 15);
$pdf->Cell(20,4,"",0);
$pdf->Cell(0,4,"FORERO PAEZ",0);
$pdf->Ln(5);


$pdf->Ln(6);
$pdf->SetFont('Courier', 'B', 13);
$pdf->Cell(18,5,"",0);
$pdf->Cell(39,5,"Balance Diario ",0);
$pdf->Ln(5);
$pdf->SetFont('Courier', 'B', 13);
$pdf->Cell(24,5,"",0);
$pdf->Cell(39,5,date("d-m-Y"),0);
$pdf->Ln(7);
$pdf->Cell(12,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Total Carros: ",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,$totalcarro,0);
$pdf->Ln(5);
$pdf->Cell(12,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Total Motos: ",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,$totalmoto,0);
$pdf->Ln(5);
$pdf->Cell(12,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Total Camioneta: ",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,$totalcamioneta,0);
$pdf->Ln(5);
$pdf->Cell(12,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Total Mensual: ",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,$totalmes,0);
$pdf->Ln(5);
$pdf->Cell(12,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"TOTAL: ",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(32,5,$totalfinal,0);
$pdf->Ln(5);
#$pdf->Output("balancediario.pdf","I");

$pdf->AutoPrint(true);
$pdf->Output();

/*******************************************************************************/
?>
