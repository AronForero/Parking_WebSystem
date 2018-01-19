<?php

function set_mes($placa, $estado, $mensual, $horae, $horas, $fechae, $fechas, $prop, $tel, $val){
  include("Connection.php");
  $con = Conexion();
  $consulta = "SELECT * FROM mensuales WHERE placa = '$placa'";
  $result1 = pg_query($con, $consulta);
  $rows = pg_num_rows($result1);
  $fecham = $fechae;
  if ($rows > 0) {
    $campos = pg_fetch_array($result1);
    if ($campos["2"] == "SI") {
      ?>
      <script type="text/javascript">
        alert("El Vehiculo ya esta registrado");
        window.location.replace("../registrarmes.php");
      </script>
      <?php
    }
    else
        {
  	     $update = "UPDATE mensuales SET estado = '$estado', mensual = '$mensual', horae = '$horae', horas = '$horas', fechae = '$fechae', fechas = '$fechas', fecham = '$fecham', propietario = '$prop', telefono = '$tel', pago = '$val' WHERE placa = '$placa'";
  	     $result2 = pg_query($con, $update);
       }
  }
  else{
  	$insert = "insert into mensuales(placa, estado, mensual, horae, horas, fechae, fechas, fecham, propietario, telefono, pago) values('$placa', '$estado', '$mensual', '$horae', '$horas', '$fechae', '$fechas', '$fecham', '$prop', $tel, $val)";
  	$result = pg_query($con, $insert);
  }  
  #header("refresh: 0; url=../ConsultaPlaca.php");
  }
 ?>