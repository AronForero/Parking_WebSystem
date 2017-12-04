<?php
function factent($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2)
{
  /********************* Envio a la base de datos *******************************/
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require("Connection.php");
  $conexion = Conexion();
  if ($diario2 == "SI") {
    $pago = 3000;
  }
  $insert = "insert into vehiculo(placa, estado, horae, horas, pago, casco, fechae, fechas, diario) values('$placa2', '$estado', '$horai', '$horas', '$pago', '$cascos', '$fechai', '$fechas', '$diario2')";
  $result = pg_query($conexion, $insert);
}
?>
