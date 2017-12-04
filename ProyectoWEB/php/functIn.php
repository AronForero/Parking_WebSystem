<?php
function factent($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $mensual, $fecham, $stu)
{
  /********************* Envio a la base de datos *******************************/
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require("Connection.php");
  $conexion = Conexion();
  if ($diario2 == "SI") {
    $pago = 3000;
  }
  $insert = "insert into motos(placa, estado, horae, horas, pago, casco, fechae, fechas, diario, mes, fecham, student) values('$placa2', '$estado', '$horai', '$horas', '$pago', '$cascos', '$fechai', '$fechas', '$diario2', '$mensual', '$fecham', '$stu')";
  $result = pg_query($conexion, $insert);
}
?>
