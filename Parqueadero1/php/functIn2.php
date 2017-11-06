<?php
function factent2($estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $mensual, $fecham, $placa2, $stu)
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  include("Connection.php");
  $con = Conexion();
  if ($estado == "t" and $diario2 == "SI") {
    $pago = 3000;
  }
  $update = "update motos set estado='$estado', horae='$horai', horas='$horas', pago='$pago', casco='$cascos', fechae='$fechai', fechas='$fechas', diario='$diario2', mes='$mensual', fecham='$fecham', student='$stu' where placa='$placa2'";
  $result = pg_query($con, $update);
}
 ?>
