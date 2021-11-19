<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');


$e = new Empresas();
$vuelos = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if(count($_GET)>0){

    $error = false;
    try {
      if(!isset($_GET['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');
      $id = $_GET['id_empresa'];
      $e->eliminarEmpresa($id);
      $vuelos->eliminarVuelosByEmpresa($id);

      $datos = $e->getEmpresas();
      $resultado = 'Empresa eliminada con exito';

      $v = new Administrador();
      $v->empresas = $datos;
      $v->resultado = $resultado;
      $v->render();

    } catch (Exception $e) {
      $error = true;
      $resultado = $err->getMessage();
    }

    if ($error) {
      $datos = $e->getEmpresas();

      $v = new Administrador();
      $v->empresas = $datos;
      $v->resultado = $resultado;
      $v->render();
    }

  }

}
