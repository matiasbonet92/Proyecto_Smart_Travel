<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/EditarEmpresa.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../views/EditarVuelo.php');
require('../models/Vuelos.php');

$emp = new Empresas();
$e = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)>0) {

    $error = false;

    try {

      if(!isset($_POST['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');
      if(!isset($_POST['id_vuelos'])) throw new Exception('El campo id_vuelos no puede estar vacio');
      if(!isset($_POST['nombre_vuelo'])) throw new Exception('El campo nombre no puede estar vacio');
      if(!isset($_POST['origen'])) throw new Exception('El campo origen no puede estar vacio');
      if(!isset($_POST['destino'])) throw new Exception('El campo destino no puede estar vacio');
      if(!isset($_POST['descripcion_vuelo'])) throw new Exception('El campo descripcion no puede estar vacio');
      if(!isset($_POST['fecha_origen'])) throw new Exception('El campo fecha_origen no puede estar vacio');
      if(!isset($_POST['fecha_destino'])) throw new Exception('El campo fecha_destino no puede estar vacio');
      if(!isset($_POST['precio'])) throw new Exception('El precio no puede estar vacio');

      $id_empresa = $_POST['id_empresa'];
      $id_vuelos = $_POST['id_vuelos'];
      $nombre = $_POST['nombre_vuelo'];
      $origen = $_POST['origen'];
      $fecha_origen = $_POST['fecha_origen'];
      $destino = $_POST['destino'];
      $fecha_destino = $_POST['fecha_destino'];
      $precio = $_POST['precio'];
      $descripcion_vuelo = $_POST['descripcion_vuelo'];

      $e->editarVuelo($id_empresa,$id_vuelos,$nombre,$origen,$fecha_origen,$destino,
      $fecha_destino,$precio,$descripcion_vuelo);

      $resultado = 'Vuelo ' . $nombre . ' modificado con exito';
      $vuelos_empresa = $e->getVuelosByEmpresa($id_empresa);
      $nombre_empresa = $emp->getEmpresaById($id_empresa);

      $v = new Administrador();
      $v->vuelos_empresa = $vuelos_empresa;
      $v->resultado = $resultado;
      $v->nombre_empresa = $nombre_empresa;
      $v->render();

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new EditarVuelo();
      $v->resultado = $resultado;
      $v->render();

    }

  }elseif(count($_GET)>0){

    $error = false;

    try {

      if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelos no puede estar vacio');
      $id = $_GET['id_vuelo'];
      $datos = $e->getVueloById($id);

      $v = new EditarVuelo();
      $v->datos_vuelo = $datos;
      $v->render();
    }catch(Exception $err){
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
