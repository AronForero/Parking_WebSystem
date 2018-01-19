<html>
<head>
	<title>VEHICULOS EN PARQUEADERO</title>
	<link rel="shortcut icon" href="../images/tire-icon.png"  height="32" width="32">
<link rel="stylesheet" type="text/css" href="../css/consult.css" media="screen"/>
</head>
<body class="mensualid" background="../images/fondocarritus.jpg">
	<center>
		<center> <p id="consultafont">PARQUEADERO FORERO PAEZ</p></center>
		<center><p id="title">VEHICULOS EN PARQUEADERO</p></center>
 <?php
    session_start();
    if ($_SESSION['user']!=null)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        include("Connection.php");
        date_default_timezone_set('America/Bogota');

      $consultab = "SELECT * FROM vehiculo WHERE estado='t'";
      $consultames = "SELECT * FROM mensuales WHERE estado='t'";
      $con = Conexion();
      $resultb = pg_query($con, $consultab);
      $resultmes = pg_query($con, $consultames);



      if(!$resultb)
      {
        echo "An error occurred.\n";
        exit;
      }
 
      echo "<table border bordercolor='black' >";
      echo "<tr>";
		  echo "<th>PLACA</th>";
      echo "<th>TIPO</th>";
      echo "<th>HORA ENTRADA</th>";
      echo "<th>TIPO DE PAGO</th>";
      



      while ($row = pg_fetch_array($resultb))
      {
         
        /*****PARTE DE TIPO DE CARRO*****/
        if ($row["tipo"] == "1") {
         $tipo = "MOTO";
          }
          else {
            if ($row["tipo"] == "2") {
              $tipo = "CARRO";
            }else{
              $tipo = "CAMIONETA";
            }
          }
          /*****************************/
        /*******PARTE DE CAMBIO A FORMATO 12 HORAS*************/
        if ($row["horae"] > 12) {
        $horaingreso = ($row["horae"] - 12).substr($row["horae"], 2, 3)." pm";
        }
        else{
          $horaingreso = substr($row["horae"], 0, 5)." am";
        }
        /*****************************************************/
        if ($row["mediodia"] == "SI") {
          $tipopag = "MEDIO DIA";
          }else{
            if ($row["diario"]== "SI") {
            $tipopag = "DIA ENTERO";
          }else{
            $tipopag = "POR HORA";
          }
        }
  
        echo "<tr>";
        echo "<td>".$row["placa"]."</td>";
        echo "<td>".$tipo."</td>";
        echo "<td>".$horaingreso."</td>";
        echo "<td>".$tipopag."</td>";
        echo "</tr>";
   
      }
      while ($row1 = pg_fetch_array($resultmes)) {
        /*******PARTE DE CAMBIO A FORMATO 12 HORAS*************/
        if ($row1["horae"] > 12) {
        $horaingreso = ($row1["horae"] - 12).substr($row1["horae"], 2, 3)." pm";
        }
        else{
          $horaingreso = substr($row1["horae"], 0, 5)." am";
        }
        /*****************************************************/
        echo "<tr>";
        echo "<td>".$row1["placa"]."</td>";
        echo "<td>"."MENSUAL"."</td>";
        echo "<td>".$horaingreso."</td>";
        echo "<td>"."MENSUAL"."</td>";
        echo "</tr>";
      }

     
      echo "</table>";
?> 
</br></br>

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