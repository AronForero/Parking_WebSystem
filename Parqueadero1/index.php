<html>
<head>
    <title>Parqueando en la 12</title>
   <link rel="shortcut icon" href="images/tire-icon.png">
    <meta name="" content="" charset="utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="css/loginSS.css" media="screen"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300i" rel="stylesheet">
</head>

<?php
session_start();
if ($_SESSION['user']!="root") {

 ?>
 <body>

     <div class="">
       <p>PARQUEANDO EN LA 12</p>
       <form action="php/login.php" method="POST">
         <label for="">Iniciar Sesión</label></br>
           
            <input type="text" name="id" placeholder="ID o Login"></br>
          
            <input type="password" name="pass" placeholder="Contraseña"></br>
           
           
             <input type="submit" name="" value="Ingresar">

             <input type="reset" name="" value="Limpiar"></td>
           
         
       </form>
     </div>
    
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
