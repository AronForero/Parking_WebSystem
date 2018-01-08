<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
.tabelle {
	width: 578px; border-collapse: collapse; 
	text-align: center;
}
.zelle{
	padding: 3px; 
	background-color: White; 
	font-family: Arial; 
	font-size: 12px;
	text-align: center; 
	color: Black; 
}
th {
	background-color: SteelBlue;
	padding: 3px; 
	color: White; 
	font-size: 12px;
	font-family: Arial; 
}
.separate {
	border-radius: 10px;
	border-spacing: 0;
	border-collapse: separate;
}
.separate td, table.separate th {
	border-bottom: 2px solid Black;
	border-right: 2px solid Black;
}
.separate tr:last-child td:first-child {
	border-bottom-left-radius: 10px;
}
.separate tr:last-child td:last-child {
	border-bottom-right-radius: 10px;
}
.separate tr th:first-child, table.separate tr td:first-child {
	border-left: 2px solid Black;
}
.separate tr:first-child th, table.separate tr:first-child td {
	border-top: 2px solid Black;
}
.separate tr:first-child th:first-child, table.separate tr:first-child td:first-child {
	border-top-left-radius: 10px
}
.separate tr:first-child th:last-child, table.separate tr:first-child td:last-child {
	border-top-right-radius: 10px;	
}
     </style>
  </head>
  <body>
  	<center> <p>PARQUEADERO FORERO PAEZ</p></center>
    <?php
    session_start();
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
     <center> 
           <TABLE class="tabelle separate">
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
			    <TD colspan=4 text>TOTAL DIARIO  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $filatotal["0"]; ?></TD> 

			  </TR>
			</TABLE>   

           
         
        <form class="" action="moneyrange.php" method="post">
          <table>
            <tr>
              <th colspan="3">Consultar Ingresos</th>
            </tr>
            <tr>
              <td><input type="date" name="fecha1" value=""></td>
              <td><input type="date" name="fecha2" value=""></td>
              <td><input type="submit" name="" value="Buscar"></td>
            </tr>
          </table>
        </form>
         <td><button type="button" class="myButton" name="button" onclick="window.close()">CERRAR</button></td>
    </center>  
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
