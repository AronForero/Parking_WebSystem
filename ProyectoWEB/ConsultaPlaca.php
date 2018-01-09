<?php session_start();
if ($_SESSION['user']!=null) {

 ?>
<html>
  <head>
   <link rel="shortcut icon" href="images/tire-icon.png">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
   
    <title>Ingreso de Motocicletas</title>
    <style media="screen">
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    </style>
    <script type="text/javascript" src="php/validacion.js"></script>
  </head>
  <body>
<img id="fondo" src="images/fondo.jpg" alt="background image"/>

  
  
      <form id="consulta" action="php/ConsultaPlaca1.php" method="POST" onsubmit="return validacion()" name="formulario1">

        
             &ensp;    &ensp; &ensp; &ensp;&ensp;&ensp;&ensp;<b><font size = 6>Placa: </font>&ensp;</b><input type="text" name="placa" id="placa" maxlength="6" placeholder="Placa" height="100" size="10" style="height:45"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></br>

             <input type="hidden" name="preciohora" value = -1></br>
         
           &ensp;&ensp; &ensp; &ensp; <font size = 4>Pago Medio Dia:&ensp;&ensp;&ensp;SI <input type="radio" name="medio"> NO <input type="radio" name="medio" checked=""></br></br></font>
         
            &ensp;&ensp;&ensp;<font size = 4>Pago Diario: &ensp;&ensp; SI<input type="radio" name="diario" value="SI"> NO<input type="radio" name="diario" value="NO" checked></br></br></font>
         
           <font size = 4> Tipo de Vehiculo: <select name="tipo" id="tipo">
               <option value="CARRO"  id="tipo">Carro</option>
               <option value="MOTO"  id="tipo">Motocicleta</option>
               <option value="CAMIONETA">Camioneta</option>
             </select></br></br></font>
          
           <center><input type="image" src="images/Consultar.png" height="77" width="243"/></center>

</div>

      </form>
    



     <div id="balance">
      <input type="image" src="images/balancediario.png" height="49" width="255" onclick="window.open('php/consultacaja.php','nuevaVentana','width=1000, height=670, top=0, left=0')" /> <!--click balance -->
      
      </div>

      <div id="cerrar">
        <a href="php/close.php"><img src="images/cerrar-sesión.png" height="71" width="350" top="0" right="0"></a><!--click cerrar sesión -->
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
