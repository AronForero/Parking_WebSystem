<?php
function factent2($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $tipo)
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  include("Connection.php");
  $con = Conexion();
  #se eliminaron algunas lineas innecesarias para el calculo del precio ya que a la funcion le llega un parametro
  #con el precio calculado
  $update = "update vehiculo set estado='$estado', tipo='$tipo', horae='$horai', horas='$horas', pago='$pago', casco='$cascos', fechae='$fechai', fechas='$fechas', diario='$diario2' where placa='$placa2'";
  $result = pg_query($con, $update);
}
 ?>
