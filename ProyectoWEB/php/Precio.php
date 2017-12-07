<?php
function price($fechaing, $cascos, $horaing, $preciohorabase = -1, $stu) #revisar el parametro por defecto
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  date_default_timezone_set('America/Bogota');

  $año = date('Y');
  $Month = date('m');
  $Day = date('d');

    if ($Month == date("m", strtotime($fechaing)))
    {
    /************************************Parte de los Dias*************************************************/
      if ($Day == date("d", strtotime($fechaing)))
      {
        #echo "Los dias son iguales";
          $difhoras = (date("H:i:s", time()))-$horaing;
          if ($difhoras == 0) {
            $Tpago=$preciohorabase+($cascos*100);
          }
          else {
              $Tpago = ($difhoras*$preciohorabase)+($cascos*100);
          }
      }
      else {
        #echo "no son iguales los dias";
        $difdias = $Day - (date("d", strtotime($fechaing))) - 1; /*Diferencia (TOTAL de dias) en dias sera 0 o mayor, se le resta uno para que cuando sea de un dia para otro de 0**/

        $rest = 24 - $horaing; /*Resto del dia de ingreso*/
        $Thoras= $rest + date("H:i:s", time()); /*Resto del dia y el dia actual las horas que han pasado*/
        $h24 = floor($Thoras / 24); /*Parte entera, o total de dias maximo 1 creo... xd........OPCIONAL casi nunca se usa*/
        $res = ($Thoras % 24); /*Resto de horas*/
        if ($res <= 0) {
           $res = 0; /* si res es 0 o menos, es porque era menor a 4 entonces se tomara como 0 para que no afecte la ecuacion abajo*/
          }
        $Tpago = ($h24*3000)+($difdias*3000)+($res*$preciohorabase)+($cascos*100); /*Si difdias=0 no afectara, y si res=0 no afectara, si h24=0 no afectara*/
        }
    /*******************************************************************************/
      return $Tpago;
    }
    else //Parte de que se dejan muchos dias y cambia el mes... PREGUNTAR
    {
      $Mes = date("m", strtotime($fechaing));
      $Dia = date("d", strtotime($fechaing));
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

      /************************************Parte de los Dias*************************************************/

        if ($Day == date("d", strtotime($fechaing)))
        {
          #echo "Los dias son iguales";
          $Tpago=30000;
        }
        else {
          #echo "no son iguales los dias";
          $difdias = $diasr - 1;
          $rest = 24 - $horaing; /*Resto del dia de ingreso*/
          $Thoras= $rest + date("H:i:s", time()); /*Resto del dia y el dia actual las horas que han pasado*/
          $h24 = floor($Thoras / 24); /*Parte entera, o total de dias maximo 1 creo... xd*/
          $res = ($Thoras % 24); /*Resto de horas, menos 4 que valdran mil pesos no mas*/
          if ($res <= 0) {
             $res = 0; /* si res es 0 o menos, es porque era menor a 4 entonces se tomara como 0 para que no afecte la ecuacion abajo*/
            }
          $Tpago = ($h24*3000)+($difdias*3000)+($res*$preciohorabase)+($cascos*100); /*Si difdias=0 no afectara, y si res=0 no afectara, si h24=0 no afectara*/
          }
      /*******************************************************************************/
        return $Tpago;
    }

}
 ?>
