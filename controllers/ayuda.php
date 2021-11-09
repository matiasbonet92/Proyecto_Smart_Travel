<?php

//controllers/administrador
session_start();

require('../fw/fw.php');
require('../views/Ayuda.php');
require('../models/Empresas.php');


$e = new Empresas();


$empresas = $e->getEmpresas();

$v = new Ayuda();
$v->empresas = $empresas;
$v->render();

?>
