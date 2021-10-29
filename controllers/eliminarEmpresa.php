<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/Administrador.php');
require('../models/Empresas.php');


$e = new Empresas();

if (isset($_SESSION['logueado'])) {

  if(count($_GET)>0){

    $id = $_GET['id_empresa'];
    $e->eliminarEmpresa($id);

    $datos = $e->getEmpresas();
    $resultado = 'Empresa eliminada con exito';

    $v = new Administrador();
    $v->empresas = $datos;
    $v->resultado = $resultado;
    $v->render();

  }

}
