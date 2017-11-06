<?php
session_start();
unset($_SESSION['user']);
session_destroy();

header("refresh: 0; url=../index.php");
 ?>
