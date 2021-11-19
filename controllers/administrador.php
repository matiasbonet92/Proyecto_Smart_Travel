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

    $error = false;
    try {
      if(!isset($_GET['id_empresa'])) throw new Exception('El campo id no puede estar vacio');
      $id = $_GET['id_empresa'];
      $vuelos_empresa= $vuelos->getVuelosByEmpresa($id);
      $nombre_empresa = $e->getEmpresaById($id);

      $v = new Administrador();
      $v->vuelos_empresa = $vuelos_empresa;
      $v->nombre_empresa = $nombre_empresa;
      $v->id_empresa = $id;
      $v->render();
    } catch (Exception $err) {
      $error = true;
      $mensaje = $err->getMessage();
    }

    if ($error) {
      $empresas = $e->getEmpresas();

      $v = new Administrador();
      $v->empresas = $empresas;
      $v->resultado = $mensaje;
      $v->render();
    }


  }else{
    $empresas = $e->getEmpresas();

    $v = new Administrador();
    $v->empresas = $empresas;
    $v->render();
  }

}





?>
