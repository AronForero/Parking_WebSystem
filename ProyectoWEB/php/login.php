<?php
session_start();
extract($_POST);
include("Connection.php");
$conn=Conexion();

$consulta = "select * from usuarios where login='$id'";
$execute = pg_query($conn, $consulta);

$pas = pg_fetch_array($execute);
if ($pas["1"]==$pass) {
  $_SESSION['user']=$id;
  echo "Acceso Concedido";
  header("refresh: 0; url=../ConsultaPlaca.php");
}
else {
  $_SESSION['user']=null;
  echo "<H1>Acceso Denegado... Por favor Reintente</H1>";
  header("refresh: 2; url=../index.php");
}
?>
