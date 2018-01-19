<?php
function price($fechaing, $cascos, $horaing, $preciohorabase, $tipo, $daily, $halfday) #revisar el parametro por defecto
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  date_default_timezone_set('America/Bogota');

  $año = date('Y');
  $Month = date('m');
  $Day = date('d');

  $minent = date("i", strtotime($horaing));
  $minsal = date("i", time());

  if ($minsal < $minent) {
    if ($minent <= 50) {
      if ($minsal <= ($minent+10)) {
        $difminutos = 5;
      }
      else {
        $difminutos = 15;
      }
    }
    else {
      if ($minsal <= ($minent - 50) || $minent <= 60) {
        $difminutos = 5;
      }
      else {
        $difminutos = 15;
      }
    }
  }
  else {
    $difminutos = $minsal - $minent;
  }

  if ($tipo == "MOTO") {
    $preciodia = 4000;
  }
  else {
    if ($tipo == "CARRO") {
       $preciodia = 10000;
       $mediodia = 5000;
     }
     else{
       $preciodia = 12000;
       $mediodia = 6000;
     }
  }

    if ($Month == date("m", strtotime($fechaing)))
    {
    /************************************Parte de los Dias*************************************************/
      if ($Day == date("d", strtotime($fechaing)))
      {
        #echo "Los dias son iguales";
            $difhoras = (date("H", time()))-$horaing;
            if ($daily == "SI")
            {
                if ($difhoras <= 12) {
                  $Tpago = $preciodia + ($cascos*200);
                }
                else {
                  if ($difminutos >= 10) {
                      $Tpago = $preciodia + ($cascos*200) + $difhoras*$preciohorabase;
                  }
                  else {
                    $Tpago = $preciodia + ($cascos*200) + $difhoras*$preciohorabase - $preciohorabase;
                  }
                }
            }
            else
            {
              if ($halfday=="SI") {
                if ($difhoras <= 7) {
                  $Tpago = $mediodia + ($cascos*200);
                }
                else {
                  if ($difminutos >= 10) {
                      $Tpago = $mediodia + ($cascos*200) + ($difhoras-7)*$preciohorabase;
                  }
                  else {
                    $Tpago = $mediodia + ($cascos*200) + ($difhoras-7)*$preciohorabase - $preciohorabase;
                  }
                }
              }
              else
              {
                  if ($difhoras == 0)
                  {
                    #se creo la variable difminutos arriba
                    if ($difminutos >= 10) {
                          $Tpago = ($cascos*200) + $preciohorabase;
                      }
                      else {
                        $Tpago = ($cascos*200) + 500;
                      }
                  }
                  else {
                      #$Tpago = ($difhoras*$preciohorabase)+($cascos*200); elimine esta parte que esta de mas
                      if ($difminutos >= 10) {
                          $Tpago = ($cascos*200) + $difhoras*$preciohorabase;
                      }
                      else {
                        if ($difhoras == 1) {
                          $Tpago = ($cascos*200) + $difhoras*$preciohorabase;
                        }
                        else if($difhoras > 1){
                          $Tpago = ($cascos*200) + $difhoras*$preciohorabase - $preciohorabase;
                        }
                      }
                  }
              }
            }

      }
      else {
        #echo "no son iguales los dias";
        $difdias = $Day - (date("d", strtotime($fechaing))) - 1; /*Diferencia (TOTAL de dias) en dias sera 0 o mayor, se le resta uno para que cuando sea de un dia para otro de 0**/

        $rest = 24 - $horaing; /*Resto del dia de ingreso*/
        $Thoras= $rest + date("H:i:s", time()); /*Resto del dia y el dia actual las horas que han pasado*/
        $h12 = floor($Thoras / 12); /*Parte entera, o total de dias maximo 1 creo... xd........OPCIONAL casi nunca se usa*/
        $res = ($Thoras % 12); /*Resto de horas*/
          if ($difminutos < 15) {
              $Tpago = ($h12*$preciodia)+($difdias*$preciodia*2)+($res*$preciohorabase)+($cascos*200)-$preciohorabase; /*Si difdias=0 no afectara, y si res=0 no afectara, si h24=0 no afectara*/
          }
          else {
            $Tpago = ($h12*$preciodia)+($difdias*$preciodia*2)+($res*$preciohorabase)+($cascos*200);
          }

        }
    /*******************************************************************************/
      return $Tpago;
    }
    else //Parte de que se dejan muchos dias y se pasa de un mes a otro
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
          $Tpago=($preciodia*2)*$diasr;
        }
        else {
          #echo "no son iguales los dias";
          $difdias = $diasr - 1;
          $rest = 24 - $horaing; /*Resto del dia de ingreso*/
          $Thoras= $rest + date("H:i:s", time()); /*Resto del dia y el dia actual las horas que han pasado*/
          $h12 = floor($Thoras / 12); /*Parte entera, o total de dias maximo 1 creo... xd*/
          $res = ($Thoras % 12); /*Resto de horas, menos 4 que valdran mil pesos no mas*/
          if ($difminutos<15) {
              $Tpago = ($h24*3000)+($difdias*3000)+($res*$preciohorabase)+($cascos*200)-$preciohorabase; /*Si difdias=0 no afectara, y si res=0 no afectara, si h24=0 no afectara*/
          }
          else {
            $Tpago = ($h24*3000)+($difdias*3000)+($res*$preciohorabase)+($cascos*200);
          }

          }
      /*******************************************************************************/
        return $Tpago;
    }
}
 ?>
