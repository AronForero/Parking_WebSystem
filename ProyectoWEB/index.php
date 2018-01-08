<html>
<head>
    <title>Parqueadero Forero Paez</title>
   <link rel="shortcut icon" href="images/tire-icon.png">
    <meta name="" content="" charset="utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300i" rel="stylesheet">
</head>

<?php
session_start();
if ($_SESSION['user']!="root") {

 ?>
 <center>
 <body>

     <div class="form1">
      <center> <p>PARQUEADERO FORERO PAEZ</p></center>
       <form action="php/login.php" method="POST" id="form1">
         <label for="">Iniciar Sesión</label></br>

            <input type="text" name="id" placeholder="ID o Login"></br>

            <input type="password" name="pass" placeholder="Contraseña"></br>


             <input type="submit" name="" value="Ingresar">

             <input type="reset" name="" value="Limpiar"></td>


       </form>
     </div>
</center>
 <!--<div style="text-align:left;padding:1em 0;"> 
      	<h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3688465">
      		<iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=America%2FBogota" width="100%" height="115" frameborder="0" seamless></iframe> 
      </div>-->
 </body>
<?php
}
else {
 ?>
</html>
<?php
header("refresh: 0; url=ConsultaPlaca.php");
}
 ?>
