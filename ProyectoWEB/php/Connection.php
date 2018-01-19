<?PHP
function Conexion()
{
  $conn = pg_connect("host=localhost user=postgres port=5432 dbname=parqueadero password=12345");
  return $conn;
}
?>
