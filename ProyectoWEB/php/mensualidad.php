<?php
  include("Connection.php");
  $con = Conexion();
  extract($_POST);
  $insert = "INSERT INTO mensuales(placa, estado, mensual, horae, horas, fechae, fechas, fecham) VALUES('$placa', '$estado', '$mensual', '$horae', '$horas', '$fechae', '$fechas')";
  $result = pg_query($con, $insert);
  #header("refresh: 0; url=../ConsultaPlaca.php");
 ?>
