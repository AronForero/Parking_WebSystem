<?php
session_start();
extract($_POST);
include("Connection.php");
$conn=Conexion();

$consulta = "SELECT * FROM usuarios WHERE login='$id'";
$execute = pg_query($conn, $consulta);
$pas = pg_fetch_array($execute);

$consulta2 = "SELECT numfactura FROM log WHERE estado='f' ORDER BY registro DESC";
$execute2 = pg_query($conn, $consulta2);
$fact = pg_fetch_array($execute2);

if ($pas["1"]==$pass) {
  $_SESSION['user']="root";
  $_SESSION['fact']=$fact["0"];
  echo "Acceso Concedido";
  header("refresh: 0; url=../ConsultaPlaca.php");
}
else {
  $_SESSION['user']=null;
  echo "<H1>Acceso Denegado... Por favor Reintente</H1>";
  header("refresh: 2; url=../index.php");
}
?>
