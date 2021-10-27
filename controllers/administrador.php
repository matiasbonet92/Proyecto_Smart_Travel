<?php

//controllers/administrador
session_start();

require('../fw/fw.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');


$e = new Empresas();
$vuelos = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if (count($_GET)>0) {
    $id = $_GET['id_empresa'];
    $vuelos_empresa= $vuelos->getVuelosByEmpresa($id);

    $v = new Administrador();
    $v->vuelos_empresa = $vuelos_empresa;
    $v->render();
  }else{
    $empresas = $e->getEmpresas();

    $v = new Administrador();
    $v->empresas = $empresas;
    $v->render();
  }

}





?>
