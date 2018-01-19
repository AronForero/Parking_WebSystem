
<?php

require("pdfjs.php");
require("functIn3.php");
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
$pdf->SetFont('Courier', '', 8);
$pdf->Cell(17,5,"",0);
$pdf->Cell(0,5,"Leidy Johana Forero Paez",0);
$pdf->Ln(3);
$pdf->Cell(22,5,"",0);
$pdf->Cell(0,5,"Nit. 1.095.946.910-4",0);
$pdf->Ln(3);
#$pdf->SetFont('Courier', '', 10);
$pdf->Cell(26,5,"",0);
$pdf->Cell(0,5,"Cll 42 #11-30",0);
$pdf->Ln(3);
$pdf->Cell(24,5,"",0);
$pdf->Cell(0,5,"Cel. 3212011020",0);
$pdf->Ln(3);

$pdf->Ln(6);
$pdf->SetFont('Courier', 'B', 13);
$pdf->Cell(10,5,"",0);
$pdf->Cell(39,5,"INGRESO MENSUALIDAD",0);
$pdf->Ln(7);
$pdf->Cell(3,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Placa:",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,$placa2,0);
$pdf->Ln(5);
$pdf->Cell(3,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Hora:",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,date("h:i a", time()),0);
$pdf->Ln(5);
$pdf->Cell(3,5,"",0);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(39,5,"Fecha:",0);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell(32,5,date('d-m-Y'),0);
$pdf->Ln(10);
$pdf->SetFont('Courier', 'B', 13);
$pdf->Cell(22,5,"",0);
$pdf->Cell(39,5,"Bienvenido!",0);

#$pdf->Output("factura-empresa.pdf","I");
$diasr = 1;
factent3($placa2, $estado, $horai, $horas, $fechai, $fechas, $diasr);

$pdf->AutoPrint(true);
$pdf->Output();

/*******************************************************************************/
?>
