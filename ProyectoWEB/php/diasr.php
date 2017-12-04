<?php
function restantes($fecham1)
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  date_default_timezone_set('America/Bogota');

  $fecham = $fecham1;
  $Year = date('Y');
  $Month = date('m');
  $Day = date('d');
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
return $diasr;
}
 ?>
