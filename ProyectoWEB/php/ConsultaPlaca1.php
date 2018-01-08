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
<img id="FONDO2" src="../images/FONDO2.jpg" alt="background image"/>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("Connection.php");
include("Precio.php");

date_default_timezone_set('America/Bogota');

$placa = $_POST["placa"];
$preciohora = $_POST["preciohora"];
$diario = $_POST["diario"];
$tipo = $_POST["tipo"];
$con = Conexion();
$consulta = "select * from vehiculo where placa='$placa'";
$ejecuta= pg_query($con, $consulta);
$numfilas = pg_numrows($ejecuta);

if ($preciohora == -1) {
  if ($tipo == "MOTO") {
    $preciohora = 1000;
  }
  else {
    $preciohora = 2000;
  }
}

if ($tipo == "MOTO") {
  $tipo = 1;
  }
  else {
    $tipo = 2;
  }

if ($numfilas ==  '0')
{
  ?>
  <center>
    <h1>No existe este vehiculo en la Base de Datos</h1>
    <form action="" id="form1" method="post" onsubmit="facturaent.js">
      <center> &ensp;&ensp;&ensp;&ensp;<b>INGRESO</b></center></br></br>
      <b><font size = 7> &ensp; &ensp;Placa:</b></font><input type="text" id="placa" name="placa2" maxlength="6" placeholder="Placa" height="100" size="10" style="height:45"  value="<?php echo $placa; ?>"></br>
      <input type="hidden" name="estado" value="t" >
      <input type="hidden" name="horas" value="<?php echo date("H:i:s", time()); ?>" >
      <input type="hidden" name="pago" value="<?php echo $preciohora ?>" >
      <input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>" >
      <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
      <input type="hidden" id="cascos" name="cascos" value="0" ></br>
      <!--Se agrego un hidden con el tipo de vehiculo-->
      <!------------------------------------------------------------------------>
      <input type="hidden" name="onlyone" value="1">
      <!------------------------------------------------------------------------>
      &ensp;&ensp;&ensp;&ensp;Fecha Ingreso: <input type="text" id="fechai" name="fechai" value="<?php echo date('Y-m-d'); ?>"></br>
      &ensp;&ensp;Hora Ingreso: <input type="text" id="horai" name="horai" value="<?php echo date("H:i:s", time()); ?>"></br></br></br></br></br>
      <input type="hidden" name="diario2" value="<?php echo $diario ?>"></br>

      <!--Botones Para imprimir o guardar en la base, llaman a la funcion en JS definida arriba en el head, una abre una pestaña nueva y la otra carga en la misma pagina -->
      <!--<input type="button" value="Registrar" onClick="actionForm(this.form.id, 'IngresaPlaca.php', '_parent'); return false;" /> -->

      <center><input type="image" value="Imprimir" src="../images/Imprimir.png" height="77" width="243" onClick="actionForm(this.form.id, 'facturaent.php', '_blank'); return false;"/></center>
    </form>
  </center>


<?php
 /*header("refresh: 10; url=../ConsultaPlaca.php");DESCOMENTARIARRRRRRRRRR!*/ 
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
    <form id="formu2" method="post">
      <!-- <label for="">Registro de Vehiculo 1</label></br>-->
       <center> &ensp;&ensp;&ensp;&ensp;<b>INGRESO</b></center></br>
      <b><font size = 7> &ensp;&ensp;&ensp;&ensp;&ensp;Placa:</b></font><input type="text" id="placa" name="placa2" maxlength="6" placeholder="Placa" height="100" size="10" style="height:45"  value="<?php echo $placa; ?>"></br></br>




        <input type="hidden" name="estado" value="t">
        <input type="hidden" name="horas" value="<?php echo date("H:i:s", time()); ?>">
        <input type="hidden" name="pago" value="<?php echo $preciohora ?>">
        <input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="diario2" value="<?php echo $diario ?>"> <!--ACA PUSE LO DEL DIARIO Y ARRIBA ESTAN LAS OTRAS HIDDEN -->
        <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
        <input type="hidden" name="cascos" value="0">
        <!--se agrego un hidden para la variable tipo-->
        <!------------------------------------------------------------------------>
        <input type="hidden" name="onlyone" value="0"> <!--este campo se utiliza para saber si es la primera vez que ingresa la motocicleta "hacer update o insert"-->
        <!------------------------------------------------------------------------>
          &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Fecha Ingreso: <input type="date" name="fechai" value="<?php echo date('Y-m-d'); ?>" /></br>
          &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Hora Ingreso: <input type="text" name="horai" value="<?php echo date("H:i:s", time()); ?>"></br></br></br></br></br>

        <!--  <input type="button" value="Registrar" onClick="actionForm(this.form.id, 'updatemoto.php', '_parent'); return false;" /> -->
        
        <center><input type="image" src="../images/Imprimir.png" height="77" width="243" onClick="actionForm(this.form.id, 'facturasal.php', '_blank'); return false;"/></center>
    </form>

  <?php
 /*header("refresh: 10; url=../ConsultaPlaca.php");DESCOMENTARIARRRRRRRRRR!*/ 
    }
else {
  if ($estado == "t")
  {
    /*Pequeño Programa para calcular el Total a Pagar por el cliente se tomo en cuenta horas, dias, cascos FAVOR REVISAR!!!!!*/
    $cascos = 0; #no se tomaran en cuenta cascos en este parqueadero, pero se deja la variable por si alguna vez se cambia
    $fechaing = $fila["6"];
    $horaing = $fila["2"];
    $preciohorabase = $fila["4"];
    #se elimino variable stu, que indicaba si era un estudiante

          $Tpago = price($fechaing, $cascos, $horaing, $preciohorabase, $tipo, $daily);

        #se elimino la parte del dia, se tomara en cuenta en la funcion price
   } //Fin del programa para calcular el precio

   if ($horaing > 12) {
     $horaingreso = ($horaing - 12).substr($horaing, 2, 3)." pm";
   }
   else{
    $horaingreso = substr($horaing, 0, 5)." am";
   }
   $fechaingreso = substr($fechaing, 8, 2)."-".substr($fechaing, 5, 2)."-".substr($fechaing, 0, 4);
    ?>
    <center>
    <form id="form3" method="post">
    <!-- <label for="">Registro de Vehiculo</label></br>-->
     <b><font size = 7>Placa:&ensp;<b><input id=placa type="text" name="placa2" maxlength="6" placeholder="Placa" height="100" size="6"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $placa; ?>"></br></br></font>
     Hora de Entrada: <input type="text" name="horai" value="<?php echo $fila["2"]; ?>"></br></br>
      <input type="hidden" name="horaing" value="<?php echo $horaingreso; ?>">
     &ensp;&ensp;Hora de Salida: <input type="text" name="horas" value="<?php echo date("H:i:s", time()); ?>"></br></br>
     &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Fecha de Entrada: <input type="date" name="fechai" value="<?php echo $fila["6"] ?>"></br></br>
      <input type="hidden" name="fechaing" value="<?php echo $fechaingreso ?>">
     &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Fecha de Salida: <input type="date" name="fechas" value="<?php echo date('Y-m-d'); ?>"></br></br>
     &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Total Pagar: <input type="number" name="pago" value="<?php echo $Tpago ?>"></br></br></br></br>
      <input type="hidden" name="cascos" value="0">
      <input type="hidden" name="estado" value="f">
      <input type="hidden" name="diario2" value="NO">

      <!--<input type="button" value="Registrar" onClick="actionForm(this.form.id, 'updatemoto.php', '_parent'); return false;" />-->
      
       <center><input type="image" src="../images/Imprimir.png" height="77" width="243" onClick="actionForm(this.form.id, 'facturasal.php', '_blank'); return false;"/></center>
    </form>
    </center>
<?php
 /*header("refresh: 10; url=../ConsultaPlaca.php");DESCOMENTARIARRRRRRRRRR!*/ 
  }
}
?>
<div id="atras">
<a href="../ConsultaPlaca.php"><img src="../images/back.png" height="60" width="60" ></a>
</div>
 </body>
 </html>
