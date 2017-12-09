<html>
<head>
<TITLE>Motocicleta</TITLE>
<link rel="shortcut icon" href="../images/tire-icon.png">
<link rel="stylesheet" type="text/css" href="../css/consult.css" media="screen"/>
<script>
  function actionForm(formid, act, tar)
  {
      document.getElementById(formid).action=act;
      document.getElementById(formid).target=tar;
      document.getElementById(formid).submit();
  }
</script>
</head>
<body >
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("Connection.php");
include("diasr.php");
include("Precio.php");

date_default_timezone_set('America/Bogota');

$placa = $_POST["placa"];
$preciohora = $_POST["preciohora"];
$diario = $_POST["diario"];
$tipo = $_POST["tipo"]
$con = Conexion();
$consulta = "select * from vehiculo where placa='$placa'";
$ejecuta= pg_query($con, $consulta);
$numfilas = pg_numrows($ejecuta);
if ($numfilas ==  '0')
{
  ?>
  <center>
    <h1>No existe este vehiculo en la Base de Datos</h1>
    <form action="" id="form1" method="post" onsubmit="facturaent.js">
     <label for="">Insertar Motocicleta</label></br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Placa:<input type="text" id="placa" name="placa2" value="<?php echo $placa; ?>"></br>
      <input type="hidden" name="estado" value="t" >
      <input type="hidden" name="horas" value="<?php echo date("H:i:s", time()); ?>" >
      <input type="hidden" name="pago" value="<?php echo $preciohora ?>" >
      <input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>" >
      <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
      <!--Se agrego un hidden con el tipo de vehiculo-->
      <!------------------------------------------------------------------------>
      <input type="hidden" name="onlyone" value="1">
      <!------------------------------------------------------------------------>
      &nbsp;&nbsp;&nbsp;Fecha Ingreso: <input type="text" id="fechai" name="fechai" value="<?php echo date('Y-m-d'); ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora Ingreso: <input type="text" id="horai" name="horai" value="<?php echo date("H:i:s", time()); ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cascos: <input type="number" id="cascos" name="cascos" value="0" ></br>
      <input type="hidden" name="diario2" value="<?php echo $diario ?>"></br>

      <!--Botones Para imprimir o guardar en la base, llaman a la funcion en JS definida arriba en el head, una abre una pestaña nueva y la otra carga en la misma pagina -->
      <!--<input type="button" value="Registrar" onClick="actionForm(this.form.id, 'IngresaPlaca.php', '_parent'); return false;" /> -->
      <input type="button" value="Imprimir" onClick="actionForm(this.form.id, 'facturaent.php', '_blank'); return false;" />
    </form>
  </center>
  <?php
}
else
{
  $fila = pg_fetch_array($ejecuta);
  $estado = $fila["estado"];
  #se elimino variable month que indicaba si se habia pagado mensualidad
  #se elimino la variable que indicaba la fecha de cuando se acababa la mensualidad
  $daily = $fila["9"];

if ($estado == "f")
    {
?>
    <form id="form2" method="post">
       <label for="">Registro de Vehiculo 1</label></br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Placa:<input type="text" name="placa2" value="<?php echo $placa; ?>" /></br>
        <input type="hidden" name="estado" value="t">
        <input type="hidden" name="horas" value="<?php echo date("H:i:s", time()); ?>">
        <input type="hidden" name="pago" value="<?php echo $preciohora ?>">
        <input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="diario2" value="<?php echo $diario ?>"> <!--ACA PUSE LO DEL DIARIO Y ARRIBA ESTAN LAS OTRAS HIDDEN -->
        <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
        <!--se agrego un hidden para la variable tipo-->
        <!------------------------------------------------------------------------>
        <input type="hidden" name="onlyone" value="0"> <!--este campo se utiliza para saber si es la primera vez que ingresa la motocicleta "hacer update o insert"-->
        <!------------------------------------------------------------------------>
        &nbsp;&nbsp;&nbsp;Fecha Ingreso: <input type="date" name="fechai" value="<?php echo date('Y-m-d'); ?>" /></br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora Ingreso: <input type="text" name="horai" value="<?php echo date("H:i:s", time()); ?>"></br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cascos: <input type="number" name="cascos" value="0">

        <!--  <input type="button" value="Registrar" onClick="actionForm(this.form.id, 'updatemoto.php', '_parent'); return false;" /> -->
        <input type="button" value="Imprimir" onClick="actionForm(this.form.id, 'facturaent.php', '_blank'); return false;" />
    </form>
  <?php
    }
else {
  if ($estado == "t")
  {
    /*Pequeño Programa para calcular el Total a Pagar por el cliente se tomo en cuenta horas, dias, cascos FAVOR REVISAR!!!!!*/
    $cascos = $fila["5"];
    $fechaing = $fila["6"];
    $horaing = $fila["2"];
    $preciohorabase = $fila["4"];
    #se elimino variable stu, que indicaba si era un estudiante

          $Tpago = price($fechaing, $cascos, $horaing, $preciohorabase, $tipo, $daily);

        #se elimino la parte del dia, se tomara en cuenta en la funcion price
   } //Fin del programa para calcular el precio

    ?>
    <form id="form3" method="post">
     <label for="">Registro de Vehiculo</label></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Placa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="placa2" value="<?php echo $placa; ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Hora de Entrada: &nbsp; <input type="text" name="horai" value="<?php echo $fila["2"]; ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Hora de Salida: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="horas" value="<?php echo date("H:i:s", time()); ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Fecha de Entrada: <input type="date" name="fechai" value="<?php echo $fila["6"] ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Fecha de Salida: &nbsp;&nbsp;<input type="date" name="fechas" value="<?php echo date('Y-m-d'); ?>"></br>
      &nbsp;&nbsp;&nbsp;&nbsp;Total Pagar: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="pago" value="<?php echo $Tpago ?>"></br>
      <input type="hidden" name="cascos" value="0">
      <input type="hidden" name="estado" value="f">
      <input type="hidden" name="diario2" value="NO">

      <!--<input type="button" value="Registrar" onClick="actionForm(this.form.id, 'updatemoto.php', '_parent'); return false;" />-->
      <input type="button" value="Imprimir" onClick="actionForm(this.form.id, 'facturasal.php', '_blank'); return false;" />
    </form>
<?php

  }
}
?>
 </body>
 </html>
