<?php
  include("Connection.php");
  $con = Conexion();
  extract($_POST);
  $fecham = $fechae;
  $insert = "INSERT INTO mensuales(placa, estado, mensual, horae, horas, fechae, fechas, fecham) VALUES('$placa', '$estado', '$mensual', '$horae', '$horas', '$fechae', '$fechas', '$fecham')";
  $result = pg_query($con, $insert);
  #header("refresh: 0; url=../ConsultaPlaca.php");
 ?>
