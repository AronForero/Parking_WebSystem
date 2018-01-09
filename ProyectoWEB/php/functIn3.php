<?php
function factent3($placa, $estado, $horae, $horas, $fechae, $fechas, $diasr)
{
  include("Connection.php");
  $con = Conexion();
  if ($diasr <= 0) {
  	$mensual = "NO";
  }
  else{
  	$mensual = "SI";
  }
  $update = "UPDATE mensuales SET estado='$estado', mensual='$mensual', horae='$horae', horas='$horas', fechae='$fechae', fechas='$fechas' WHERE placa='$placa'";
  $result = pg_query($con, $update);
}
?>