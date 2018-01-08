<?PHP
date_default_timezone_set('America/Bogota');
$hora = date("H:i:s", time());
$fecha = date('Y-m-d');
echo "Normal: ";
echo $fecha;
echo "             \n";
echo "Arreglada:";
echo substr($fecha, 8, 2)."-".substr($fecha, 5, 2)."-".substr($fecha, 0, 4);
?>