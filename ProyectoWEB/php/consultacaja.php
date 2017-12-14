<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .myButton, form input[type="button"]{
      	margin-left: 700px;
      	margin-top: 20px;
      	-moz-box-shadow: 5px 4px 8px 0px #0874cc;
      	-webkit-box-shadow: 5px 4px 8px 0px #0874cc;
      	box-shadow: 5px 4px 8px 0px #0874cc;
      	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f5faff), color-stop(1, #003870));
      	background:-moz-linear-gradient(top, #f5faff 5%, #003870 100%);
      	background:-webkit-linear-gradient(top, #f5faff 5%, #003870 100%);
      	background:-o-linear-gradient(top, #f5faff 5%, #003870 100%);
      	background:-ms-linear-gradient(top, #f5faff 5%, #003870 100%);
      	background:linear-gradient(to bottom, #f5faff 5%, #003870 100%);
      	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5faff', endColorstr='#003870',GradientType=0);
      	background-color:#f5faff;
      	-moz-border-radius:42px;
      	-webkit-border-radius:42px;
      	border-radius:42px;
      	display:inline-block;
      	cursor:pointer;
      	color:#ffffff;
      	font-family:Trebuchet MS;
      	font-size:19px;
      	font-weight:bold;
      	padding:13px 37px;
      	text-decoration:none;
      	text-shadow:-1px 0px 0px #528ecc;
      }
      .myButton:hover {
      	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #003870), color-stop(1, #f5faff));
      	background:-moz-linear-gradient(top, #003870 5%, #f5faff 100%);
      	background:-webkit-linear-gradient(top, #003870 5%, #f5faff 100%);
      	background:-o-linear-gradient(top, #003870 5%, #f5faff 100%);
      	background:-ms-linear-gradient(top, #003870 5%, #f5faff 100%);
      	background:linear-gradient(to bottom, #003870 5%, #f5faff 100%);
      	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#003870', endColorstr='#f5faff',GradientType=0);
      	background-color:#003870;
      }
      .myButton:active {
      	position:relative;
      	top:1px;
      }

    </style>
  </head>
  <body>
    <?php
    session_start();
    if ($_SESSION['user']!=null)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        include("Connection.php");
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d');
        $consulta = "select sum(pago) from backup where fechas='$date'"; //Agregar consulta para saber cuantos vehiculos entraron y cuantos de cada tipo
        $con = Conexion();
        $result = pg_query($con, $consulta);
        $fila = pg_fetch_array($result);
        ?>
        <table>
          <tr>
            <th>TOTAL DIARIO:</th><td>$<?php echo $fila["0"]; ?></td>
            <td><button type="button" class="myButton" name="button" onclick="window.close()">CERRAR!</button></td>
          </tr>
        </table>
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
