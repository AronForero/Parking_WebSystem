<html>
<head>
    <title>Parqueadero Forero Paez</title>
   <link rel="shortcut icon" href="images/tire-icon.png">
    <meta name="" content="" charset="utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <script>
  function actionForm(formid, act, tar)
  {
      document.getElementById(formid).action=act;
      document.getElementById(formid).target=tar;
      document.getElementById(formid).submit();
  }
</script>

   <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300i" rel="stylesheet">-->
</head>

<?php
session_start();
if ($_SESSION['user']!="admin") {

 ?>
 
 <body>
  <div id="pagewrap">
  <img id="fondo" src="images/iniciarsesion.jpg" alt="background image"/>
<center>
    <div id="content">
      <!--<center> <p>PARQUEADERO FORERO PAEZ</p></center>-->
       <form action="php/login.php" method="POST" id="ingresar">
        <!-- <label for="">Iniciar Sesión</label></br>-->

            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="id" id="user" placeholder="Usuario" required="" style="height:45"></br>

            &ensp;&ensp;&ensp;&ensp;<input type="password" name="pass" id="user" placeholder="Contraseña" required></br></br></br>


             <input type="image" src="images/INGRESAR.png" height="67" width="303" onClick="actionForm(this.form.id, 'php/login.php', _parent);" />
             
              <!--<input type="reset" id="boton" value="" onClick="limpiar(form)" />-->



       </form>
     </div>
  </center>   

 <!--<div style="text-align:left;padding:1em 0;"> 
      	<h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3688465">
      		<iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=America%2FBogota" width="100%" height="115" frameborder="0" seamless></iframe> 
      </div>-->
      </div>
 </body>

<?php
}
else {
 ?>
</html>
<?php
header("refresh: 0; url=index.php");
}
 ?>
