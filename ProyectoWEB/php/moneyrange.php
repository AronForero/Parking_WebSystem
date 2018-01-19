<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      error_reporting(E_ALL);
      ini_set('display_errors', '1');
      include("Connection.php");
      date_default_timezone_set('America/Bogota');
      extract($_POST);
      #################################################
      $Año = date("Y", strtotime($fecha1));
      $Mes = date("m", strtotime($fecha1));
      $Dia = date("d", strtotime($fecha1));

      $Year = date("Y", strtotime($fecha2));
      $Month = date("m", strtotime($fecha2));
      $Day = date("d", strtotime($fecha2));

      if ($Year == $Año) {
        if ($Month == $Mes) {
          $diasr = ($Day - $Dia);
        }
        else {
          /**Mes de 28 dias**/
          if ($Mes == "02") {
            $diasr = ((28-$Dia)+$Day);
          }
          /**AQUI LOS DE 30 DIAS**/
          elseif($Mes == "04") {
            $diasr = ((30-$Dia)+$Day);
          }
          elseif($Mes == "06") {
            $diasr = ((30-$Dia)+$Day);
          }
          elseif($Mes == "09") {
            $diasr = ((30-$Dia)+$Day);
          }
          elseif($Mes == "11") {
            $diasr = ((30-$Dia)+$Day);
          }
          /**QUI LOS DE 31 DIAS**/
          elseif($Mes == "01") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "03") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "05") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "07") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "08") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "10") {
            $diasr = ((31-$Dia)+$Day);
          }
          elseif($Mes == "12") {
            $diasr = ((31-$Dia)+$Day);
          }
        }
      }
      else {
        $diasr = ((31-$Dia)+$Day);
      }
    ######################################################### Necesito poner a imprimir los resultados de cada consulta y ya deberia
    ###############################funcionar :v
    $con = Conexion();
    /****************************************************************************/
    if (in_array($Mes, array("1", "3", "5", "7", "8", "10", "12")))
      {
        $indice = 31;
      }
    elseif (in_array($Mes, array("4", "6", "9", "11")))
      {
        $indice = 30;
      }
    else
      {
        $indice = 28;
      }
    /****************************************************************************/
    if ($Mes == $Month) {
      for ($i=0; $i < ($diasr+1); $i++) {
        $date = $Año."-".$Mes."-".($Dia+$i);
        $consulta = "select * from log where fechas='$date'";
        $result = pg_query($con, $consulta);
        $numerofilas = pg_numrows($result);
        if ($numerofilas ==0)
        {
          echo "<script type=\"text/javascript\">alert('No hay datos en la fecha indicada.'); window.location='consultacaja.php';</script>";
        }
        else
        {
        ?>
        <table>
          <tr>
            <th>Placa</th><th>Cascos</th><th>Hora Entrada</th><th>Hora Salida</th><th>Fecha Entrada</th><th>Fecha Salida</th><th>Pago</th>
          </tr>
        <?php
        while ($list = pg_fetch_array($result)){
          $Placa = $list["1"];
          $Cascos = $list["6"];
          $HoraE = $list["3"];
          $HoraS = $list["4"];
          $FechaE = $list["7"];
          $FechaS = $list["8"];
          $Pago = $list["5"];

          echo "<tr>";
            echo "<td>";
              echo $Placa;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $Cascos;
            echo "</td>";
            echo "<td>";
              echo $HoraE;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $HoraS;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $FechaE;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $FechaS;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $Pago;
            echo "</td>";
          echo "</tr>";

        }
        ?>
      </table>
        <?php
      } #FIN ELSE
      } #FIN DEL FOR
    } #FIN DEL IF
    else {
      while ($Dia <= $indice) {
          $date = $Año."-".$Mes."-".($Dia);
          $consulta = "select * from log where fechas='$date'";
          $result = pg_query($con, $consulta);
          $numerofilas = pg_numrows($result);
          if ($numerofilas ==0)
          {
            echo "No se registran datos para la fecha indicada.";
          }
          else
          {
          ?>
          <table>
            <tr>
              <th>Placa</th><th>Cascos</th><th>Hora Entrada</th><th>Hora Salida</th><th>Fecha Entrada</th><th>Fecha Salida</th><th>Pago</th>
            </tr>
          <?php
          while ($list = pg_fetch_array($result)){
            $Placa = $list["1"];
            $Cascos = $list["6"];
            $HoraE = $list["3"];
            $HoraS = $list["4"];
            $FechaE = $list["7"];
            $FechaS = $list["8"];
            $Pago = $list["5"];

            echo "<tr>";
              echo "<td>";
                echo $Placa;
                echo "|";
              echo "</td>";
              echo "<td>";
                echo $Cascos;
              echo "</td>";
              echo "<td>";
                echo $HoraE;
                echo "|";
              echo "</td>";
              echo "<td>";
                echo $HoraS;
                echo "|";
              echo "</td>";
              echo "<td>";
                echo $FechaE;
                echo "|";
              echo "</td>";
              echo "<td>";
                echo $FechaS;
                echo "|";
              echo "</td>";
              echo "<td>";
                echo $Pago;
              echo "</td>";
            echo "</tr>";

          }
          ?>
        </table>
          <?php
        } #FIN ELSE
        $Dia=$Dia+1;
      } #FIN DEL WHILE
      for ($i=0; $i<$Day; $i++) {
        $date = $Año."-".$Month."-".($Day+$i);
        $consulta = "select * from log where fechas='$date'";
        $result = pg_query($con, $consulta);
        $numerofilas = pg_numrows($result);
        if ($numerofilas ==0)
        {
          echo "No se registran datos para la fecha indicada.";
        }
        else
        {
        ?>
        <table>
          <tr>
            <th>Placa</th><th>Cascos</th><th>Hora Entrada</th><th>Hora Salida</th><th>Fecha Entrada</th><th>Fecha Salida</th><th>Pago</th>
          </tr>
        <?php
        while ($list = pg_fetch_array($result)){
          $Placa = $list["1"];
          $Cascos = $list["6"];
          $HoraE = $list["3"];
          $HoraS = $list["4"];
          $FechaE = $list["7"];
          $FechaS = $list["8"];
          $Pago = $list["5"];

          echo "<tr>";
            echo "<td>";
              echo $Placa;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $Cascos;
            echo "</td>";
            echo "<td>";
              echo $HoraE;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $HoraS;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $FechaE;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $FechaS;
              echo "|";
            echo "</td>";
            echo "<td>";
              echo $Pago;
            echo "</td>";
          echo "</tr>";

        }
        ?>
      </table>
        <?php
      } #FIN ELSE
      } #FIN DEL FOR
    }
    ?>
  			<a href="#" onclick="window.close()">Regresar</a>
  </body>
</html>
