
<?php

require("pdfjs.php");
require("functIn.php");
require("functIn2.php");
date_default_timezone_set('America/Bogota');
extract($_POST);

/********************* CONSTRUIMOS LA FACTURA **********************************/
$pdf = new PDF_AutoPrint();
$pdf->SetFont('courier','',8);
$pdf->SetAutoPageBreak(true, 1);
$pdf->SetLeftMargin(1);
$pdf->SetTopMargin(2);
$pdf->AddPage('P', array(65,65));

$pdf->SetFont('Courier', 'B', 12);
$pdf->Cell(0,4,"PARQUEADERO FORERO PAEZ",0);
$pdf->Ln();
$pdf->SetFont('Courier', '', 6);
$pdf->Cell(0,5,"Leidy Johana Forero Paez. - Nit. 1.095.946.910-#",0);
$pdf->Ln(3);
$pdf->SetFont('Courier', '', 7);
$pdf->Cell(0,5,"Cll 42 #11-30 - Cel. 3212011020",0);
$pdf->Ln(3);

$pdf->Ln(5);
$pdf->SetFont('Courier', '', 10);
$pdf->Cell(16,3,"Placa:",0);
$pdf->Cell(45,3,$placa2,0);
$pdf->Ln(3);
$pdf->Cell(16,3,"Hora:",0);
$pdf->Cell(45,3,date("H:i:s", time()),0);
$pdf->Ln(3);
$pdf->Cell(16,3,"Fecha:",0);
$pdf->Cell(45,3,date('Y-m-d'),0);
$pdf->Ln(3);
$pdf->Cell(16,3,"Cascos:",0);
$pdf->Cell(45,3,$cascos,0);

#$pdf->Output("factura-empresa.pdf","I");


if ($onlyone == "1") {

    factent($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $tipo);
    #se agrego la variable tipo como parametro
}
elseif ($onlyone == "0") {
    factent2($estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $tipo);
    #se agrego la variable tipo como parametro
}
$pdf->AutoPrint(true);
$pdf->Output();

/*******************************************************************************/
?>
