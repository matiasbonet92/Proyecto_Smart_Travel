<?php  

session_start();
unset($_SESSION['logueado']);
session_destroy();
header("Location: ../controllers/principal.php");