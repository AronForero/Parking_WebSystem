<html>
<head>
    <title>Parqueando en la 12</title>
   <link rel="shortcut icon" href="images/tire-icon.png">
    <meta name="" content="" charset="utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300i" rel="stylesheet">
</head>
    <?php
function newss()
{
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  include("Connection.php");
  date_default_timezone_set('America/Bogota');

  $Year = date('Y');
  $Month = date('m');
  $Day = date('d');

  $si = "SI";
  $consulta = "select placa, fecham from motos where mes='$si'";
  $con = Conexion();
  $ejecuta= pg_query($con, $consulta);

  $numfilas = pg_numrows($ejecuta);
  echo $numfilas;
  if ($numfilas == '0') {

  }
  else {
  ?>
  <div class="datagrid" style="position: absolute; top: 350; left: 30;">
     <table border="1">
     <thead><tr><th>Placa</th><th>Dias Restantes</th></tr></thead>
     <?php
     while ($fila = pg_fetch_array($ejecuta)) {
       $placa = $fila["0"];
       $fecham = $fila["1"];
       $Año = date("Y", strtotime($fecham));
       $Mes = date("m", strtotime($fecham));
       $Dia = date("d", strtotime($fecham));

       /**DIAS Y CADA MES**/
       /**28          -       30       -           31       **/
       /**2           -     4-6-9-11   -   1-3-5-7-8-10-12**/

       if ($Year == $Año) {
         if ($Month == $Mes) {
           $diasr = (30-($Day - $Dia));
         }
         else {
           /**Mes de 28 dias**/
           if ($Mes == "02") {
             $diasr = 30-((28-$Dia)+$Day);
           }
           /**AQUI LOS DE 30 DIAS**/
           elseif($Mes == "04") {
             $diasr = 30-((30-$Dia)+$Day);
           }
           elseif($Mes == "06") {
             $diasr = 30-((30-$Dia)+$Day);
           }
           elseif($Mes == "09") {
             $diasr = 30-((30-$Dia)+$Day);
           }
           elseif($Mes == "11") {
             $diasr = 30-((30-$Dia)+$Day);
           }
           /**QUI LOS DE 31 DIAS**/
           elseif($Mes == "01") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "03") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "05") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "07") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "08") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "10") {
             $diasr = 30-((31-$Dia)+$Day);
           }
           elseif($Mes == "12") {
             $diasr = 30-((31-$Dia)+$Day);
           }
         }
       }
       else {
         $diasr = 30-((31-$Dia)+$Day);
       }
       if ($diasr <= 5) {
         echo "<tr>";
         echo "<td>";
         echo $placa;
         echo "</td>";
         echo "<td>";
         echo $diasr;
         echo "</td>";
         echo "</tr>";
       }
       if ($diasr == 0) {
         $consulta2 = "select * from motos where placa='$placa'";
         $ejecuta2= pg_query($con, $consulta2);
         $fila2 = pg_fetch_array($ejecuta2);
         $estado = $fila2["1"];
         $horai = $fila2["2"];
         $horas = $fila2["3"];
         $pago = $fila2["4"];
         $cascos = $fila2["5"];
         $fechai = $fila2["6"];
         $fechas = $fila2["7"];
         $diario2 = $fila2["8"];
         $mensual = "NO";
         $fecham = $fila2["10"];
         $update = "update motos set estado='$estado', horae='$horai', horas='$horas', pago='$pago', casco='$cascos', fechae='$fechai', fechas='$fechas', diario='$diario2', mes='$mensual', fecham='$fecham' where placa='$placa'";
         $result = pg_query($con, $update);
       }
     } #cierre del while
      ?>
   </table>
   </div>

  <?php
  }
}
?>
</html>
