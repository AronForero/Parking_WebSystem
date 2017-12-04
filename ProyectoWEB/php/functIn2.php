<?php
function factent2($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2)
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  include("Connection.php");
  $con = Conexion();
  if ($estado == "t" and $diario2 == "SI") {
    $pago = 3000;
  }
  $update = "update vehiculo set estado='$estado', horae='$horai', horas='$horas', pago='$pago', casco='$cascos', fechae='$fechai', fechas='$fechas', diario='$diario2' where placa='$placa2'";
  $result = pg_query($con, $update);
}
 ?>
