
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <link rel="shortcut icon" href="../images/tire-icon.png">
<link rel="stylesheet" type="text/css" href="../css/consult.css" media="screen"/>
  </head>

  <body background="fondoconsult2.jpg" class="mensualid">
  	<center> <p id="consultafont">PARQUEADERO FORERO PAEZ</p></center>
    <?php

    session_start();
    date_default_timezone_set('America/Bogota');
    if ($_SESSION['user']!=null)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        include("Connection.php");
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d');
        $consulta1 = "select sum(pago) from log where fechas='$date' AND estado='f'" ; //suma vehiculos que salieron
        $consulta2 = "select sum(pago) from log where fechas='$date' AND tipo='2' AND estado='f'"; //suma carros que salieron

        $consulta3 = "select sum(pago) from log where fechas='$date' AND tipo='1' AND estado='f'"; //suma motos que salieron

        $consulta8 = "select sum(pago) from log where fechas='$date' AND tipo='3' AND estado='f'"; //suma camionetas que salieron

        $consulta4 = "select count(*) from log where fechas='$date' AND tipo='1' AND estado='t'"; //cuenta motos que entraron

        $consulta5 = "select count(*) from log where fechas='$date' AND tipo='2' AND estado='t'";//cuenta carros que entraron

        $consulta9 = "select count(*) from log where fechas='$date' AND tipo='3' AND estado='t'";//cuenta camionetas que entraron

        $consulta6="select count(*) from log where fechas='$date' AND tipo='1' AND estado='f'";//cuenta motos que salieron

        $consulta7="select count(*) from log where fechas='$date' AND tipo='2' AND estado='f'";//cuenta carros que salieron

        $consulta10 = "select count(*) from log where fechas='$date' AND tipo='3' AND estado='f'";//cuenta camionetas que salieron




        $con = Conexion();

        $result = pg_query($con, $consulta1);
        $result2 = pg_query($con, $consulta2);
        $result3 = pg_query($con, $consulta3);
        $result4=pg_query($con,$consulta4);
        $result5=pg_query($con,$consulta5);
        $result6=pg_query($con,$consulta6);
        $result7=pg_query($con,$consulta7);
        $result8=pg_query($con,$consulta8);
        $result9=pg_query($con,$consulta9);
        $result10=pg_query($con,$consulta10);

        $filatotal = pg_fetch_array($result);
        $filacarro = pg_fetch_array($result2); 
        $filamoto = pg_fetch_array($result3); 
        $filacam = pg_fetch_array($result8);

        $entradamoto =pg_fetch_array($result4);
        $entradacarro =pg_fetch_array($result5);
        $entradacam =pg_fetch_array($result9); 
        $salidamoto =pg_fetch_array($result6);
        $salidacarro =pg_fetch_array($result7);
        $salidacam =pg_fetch_array($result10);


        ?>
        <center> <p id="title">BALANCE DIARIO</p></center>
     <center> 
           <TABLE class="tabelle separate" >
        <TR>
          <td></td>
          <th>Entradas</th>
          <th>Salidas</th>
          <th>Recaudo</th>
        </TR>
        <TR>
          <th>CARROS</th> 
          <TD><?php echo $entradacarro["0"]; ?></TD> 
          <TD><?php echo $salidacarro["0"]; ?></TD> 
          <TD>$<?php echo $filacarro["0"]; ?></TD>
        </TR>
        <TR>
          <th>MOTOS</th> 
          <TD><?php echo $entradamoto["0"]; ?></TD> 
          <TD><?php echo $salidamoto["0"]; ?></TD>
          <TD>$<?php echo $filamoto["0"]; ?></TD>
        </TR>
        <TR>
          <th>CAMIONETAS</th> 
          <TD><?php echo $entradacam["0"]; ?></TD> 
          <TD><?php echo $salidacam["0"]; ?></TD>
          <TD>$<?php echo $filacam["0"]; ?></TD>
        </TR>
        <TR>
          <TD colspan=4 text>&ensp;&ensp; &ensp;&ensp; &ensp;&ensp;&ensp; &ensp; TOTAL DIARIO&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp; &ensp;&ensp; &ensp; &ensp;&ensp; &ensp;  &ensp;&ensp; &ensp;  &ensp;&ensp; &ensp; &ensp;&ensp; &ensp; &ensp;&ensp;&ensp; &ensp; &ensp;$<?php echo $filatotal["0"]; ?></TD> 

        </TR>
      </TABLE>   

			  </TR>
			</TABLE> </br>  

           <center> <p id="title">Registros MENSUALIDAD</p></center>
          
<?php  

error_reporting(E_ALL);
ini_set('display_errors', '1');
$fecha = date('Y-m-d');
$consultab = "select * from mensuales where fecham = '$fecha'";
$consultatotal = "SELECT sum(pago) FROM mensuales WHERE fecham = '$fecha'";
$con = Conexion();
 $resultb = pg_query($con, $consultab);
 $resultadotot = pg_query($con, $consultatotal);
 $totalpagomes = pg_fetch_array($resultadotot);
 /*$filatotal = pg_fetch_array($resultb);*/

if(!$resultb)
{
  echo "An error occurred.\n";
  exit;
}
else{
 
      echo "<table border bordercolor='black' >";
      echo "<tr>";
      echo "<th>PLACA</th>";
      echo "<th>TELEFONO</th>";
      echo "<th>PROPIETARIO</th>";
      echo "<th>VALOR</th>";
  while ($row = pg_fetch_array($resultb))
  {
    echo "<tr>";
    echo "<td>".$row["placa"]."</td>";
    echo "<td>".$row["telefono"]."</td>";
    echo "<td>".$row["propietario"]."</td>";
    echo "<td>".$row["pago"]."</td>";
  }
  echo "<tr>";
 
  echo "<th colspan=4>&ensp;&ensp;&ensp;&ensp;TOTAL REGISTROS&ensp;&ensp; &ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;$".$totalpagomes["0"]."</th>";  /*<----------- AQUI ESTA EL TOTAL POR LOS REGISTROS DE MENSUALIDAD EN EL DIA*/
  echo "<tr>";
  echo "</table>";
}
?>

<!--ESTA ES LA PARTE DE IMPRIMIR BALANCE-->
<form action="printdaily.php" method="POST" >
  <input type="hidden" name="totalmoto" value="<?php echo $filamoto["0"] ?>">
  <input type="hidden" name="totalcarro" value="<?php echo $filacarro["0"] ?>">
  <input type="hidden" name="totalcamioneta" value="<?php echo $filacam["0"] ?>">
  <input type="hidden" name="totalmes" value="<?php echo $totalpagomes["0"] ?>">
  <input type="hidden" name="totalfinal" value="<?php echo $filatotal["0"]+$totalpagomes["0"] ?>">
</br></br>
  <input type="submit" name="" class="boton1" value="IMPRIMIR BALANCE" >
</form> 
</br></br>
<!--
        <form class="" action="moneyrange.php" method="post">
          <table class="tabelle separate">
            <tr>
              <th colspan="3">Consultar Ingresos</th>
            </tr>
            <tr>
              <td>Ingreso: <input type="date" name="fecha1" value=""></td>
              <td>Salida: <input type="date" name="fecha2" value=""></td>
              <td><input type="submit" name="" value="Buscar"></td>
            </tr>
          </table>
        </form>

         <td><button type="button" class="myButton" name="button" onclick="window.close()">CERRAR</button></td>
    </center>  -->
      <?php
  }

      else
      {
        echo "<h1>Por Favor Inicie Sesion...</h1>";
        header("refresh: 3; url=../ConsultaPlaca.php");
      }
       ?>
  </body>
</html>
