<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');

$emp = new Empresas();
$vuelos = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if(count($_GET)>0){

    $erro = false;
    try {
      if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
      if(!isset($_GET['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');

      $id_vuelo = $_GET['id_vuelo'];
      $id_empresa = $_GET['id_empresa'];
      $vuelos->eliminarVuelo($id_vuelo);

      $datos = $vuelos->getVuelosByEmpresa($id_empresa);
      $nombre_empresa = $emp->getEmpresaById($id_empresa);
      $resultado = 'Vuelo eliminado con exito';

      $v = new Administrador();
      $v->vuelos_empresa = $datos;
      $v->nombre_empresa = $nombre_empresa;
      $v->resultado = $resultado;
      $v->render();

    } catch (Exception $err) {
      $error = true;
      $resultado = $err->getMessage();
    }

    if ($error) {
      $v = new Administrador();
      $v->resultado = $resultado;
      $v->render();
    }

  }

}
