<?PHP
function Conexion()
{
  $conn = pg_connect("host=localhost user=laura port=5432 dbname=Parqueadero password=12345");
  return $conn;
}
?>
