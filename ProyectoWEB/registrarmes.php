<!DOCTYPE html>
 <html>
 <head>
 	<title>MENSUALIDAD</title>
 	<link rel="shortcut icon" href="../images/tire-icon.png"  height="32" width="32">
<link rel="stylesheet" type="text/css" href="css/consult.css" media="screen"/>
 </head>
 <body class="mensualid"  background="fondoconsult2.jpg">
 
 	<?php
 	date_default_timezone_set('America/Bogota');

 	?>
 	<center> <p id="consultafont">PARQUEADERO FORERO PAEZ</p></center>
 	<center>
 	<form action="php/recibomes.php" method="POST">
 	<TABLE class="tabelle separate" >
 		<tr>
 			<th id="title">
 		 <center>REGISTRAR MENSUALIDAD</center></br></br>
 		    </th>
 		</tr>
 		</tr>
 		<td>
    </br>
       &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;PROPIETARIO:&ensp;<input type="text" name="prop"  size="40" id="title" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></br></br>
 		 &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;PLACA:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="placa" maxlength="6" size="7" id="title" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></br></br>
 		 &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;CELULAR:&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="tel" maxlength="10" size="13" id="title"></br></br>
 		
      &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;VALOR:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="val"  size="7" placeholder="$" value="27000" id="title"></br></br>
 		<input type="hidden" name="estado" value="f">
 		<input type="hidden" name="mensual" value="SI">
 		<input type="hidden" name="horae" value="<?php echo date("H:i", time()); ?>"">
 		<input type="hidden" name="horas" value="<?php echo date("H:i", time()); ?>"">
 		<input type="hidden" name="fechae" value="<?php echo date('Y-m-d'); ?>">
 		<input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>">
 		&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input id="title" type="submit" name="Registrar" value="Registrar">
    </br></br>
 		</td>
 		</tr>
 		

 		
 	</form>
 	</table>
 	</center>

 	  <center> <p id="title">MENSUALIDADES</p>
          
<?php  

error_reporting(E_ALL);
ini_set('display_errors', '1');
 include("php/Connection.php");
 include("php/diasr.php");
$consultab = "select * from mensuales where mensual='SI' ORDER BY fecham ";
$con = Conexion();
 $resultb = pg_query($con, $consultab);
 /*$filatotal = pg_fetch_array($resultb);*/

if(!$resultb)
{
  echo "An error occurred.\n";
  exit;
}
 
echo "<table border bordercolor='black'>";
echo "<tr>";
echo "<th>PLACA</th>";
       echo "<th>TELEFONO</th>";
        echo "<th>PROPIETARIO</th>";
        echo "<th>FECHA PAGO</th>";
        echo "<th>DIAS RESTANTES</th>";
echo "<tr>";

  while ($row = pg_fetch_array($resultb))
  {
   
    echo "<tr>";
      echo "<td>".$row["placa"]."</td>";
       echo "<td>".$row["telefono"]."</td>";
        echo "<td>".$row["propietario"]."</td>";
        echo "<td>".$row["fecham"]."</td>";
         echo "<td>".restantes($row["fecham"])."</td>";
    echo "<tr>";
   
  }
echo "<table>";
?> 
</center>
 
 </body>
 </html>
