<?PHP
function Conexion()
{
  $conn = pg_connect("host=localhost user=postgres port=5432 dbname=parqueadero password=123456");
  return $conn;
}
?>
