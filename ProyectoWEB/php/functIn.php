<?php
function factent($placa2, $estado, $horai, $horas, $pago, $cascos, $fechai, $fechas, $diario2, $tipo, $mediodia) #se agrego la variable tipo como parametro
{
  /********************* Envio a la base de datos *******************************/
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require("Connection.php");
  $conexion = Conexion();
  #Se eliminaron algunas lineas innecesarias para el calculo del pago, ya que a la funcion le llega un
  #parametro con este valor
  $insert = "insert into vehiculo(placa, tipo, estado, horae, horas, pago, casco, fechae, fechas, diario, mediodia) values('$placa2', '$tipo', '$estado', '$horai', '$horas', '$pago', '$cascos', '$fechai', '$fechas', '$diario2', '$mediodia')";
  $result = pg_query($conexion, $insert);
}
?>