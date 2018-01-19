<?php session_start();
if ($_SESSION['user']!=null) {

 ?>
<html>
  <head>
   <link rel="shortcut icon" href="images/tire-icon.png" height="32" width="32">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
   
    <title>PARQUEADERO FORERO PAEZ</title>
    <style media="screen">
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    </style>
    <script type="text/javascript" src="php/validacion.js"></script>
  </head>
  <body >
<img id="fondo" src="images/fondo.jpg" alt="background image"/>

  
  
      <form id="consulta" action="php/ConsultaPlaca1.php" method="POST" onsubmit="return validacion()" name="formulario1">

        
             &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b><font size = 6>Placa: </font>&ensp;</b><input type="text" name="placa" id="placa" maxlength="6" placeholder="Placa" height="100" size="10" style="height:45"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></br></br>

              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<font size = 4> Tipo de Vehiculo: <select name="tipo" id="tipo">
               <option value="CARRO"  id="tipo">Carro</option>
               <option value="MOTO"  id="tipo">Motocicleta</option>
               <option value="CAMIONETA">Camioneta</option>
             </select></br></font>

          <input type="hidden" name="preciohora" value = -1></br>
         
           <font size = 4>&ensp;&ensp;&ensp;&ensp;Tipo de pago:&ensp;&ensp;&ensp;MedioDia <input type="radio" name="tipopago" value="MEDIODIA" /> DiaEntero <input type="radio" name="tipopago" value="DIAENTERO" /> General <input type="radio" name="tipopago" value="GENERAL" checked=""></br></br></br></br></font>     
          
           <center><input type="image" src="images/Consultar.png" height="77" width="243"/></center>

</div>

      </form>
    
    <div id="addmensual">
     <!--click mensual -->
     <input type="image" src="images/MENSUALIDAD.png" height="49" width="255" onclick="window.open('registrarmes.php','nuevaVentana','width=1000, height=670, top=0, left=0');" />

      
      </div>


     <div id="balance">
      <input type="image" src="images/balancediario.png" height="49" width="255" onclick="window.open('php/consultacaja.php','nuevaVentana','width=1000, height=670, top=0, left=0');" /> <!--click balance -->
      
      </div>

      <div id="cerrar">
        <a href="php/close.php"><img src="images/cerrar-sesión.png" height="71" width="350" top="0" right="0"></a><!--click cerrar sesión -->
      </div>

       <div id="carinfo">
      <input type="image" src="images/car.png" height="80" width="80" onclick="window.open('php/consultacarro.php','nuevaVentana','width=1000, height=670, top=0, left=0');" /> <!--click balance -->
      
      </div>

  </body>
</html>
<?php
}
else {
  echo "<H1>Por Favor Inicie Sesion</H1> ";
  header("refresh: 5; url=../ProyectoWEB/");
}
 ?>
