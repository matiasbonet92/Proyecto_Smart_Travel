<?php

//controllers/agregarVuelo
session_start();

require('../fw/fw.php');
require('../views/AgregarVuelo.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');

$emp = new Empresas();
$e = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)>0) {

    $error = false;

    try {

      if(!isset($_POST['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');
      if(!isset($_POST['nombre_vuelo'])) throw new Exception('El campo nombre no puede estar vacio');
      if(!isset($_POST['origen'])) throw new Exception('El campo origen no puede estar vacio');
      if(!isset($_POST['destino'])) throw new Exception('El campo destino no puede estar vacio');
      if(!isset($_POST['descripcion_vuelo'])) throw new Exception('El campo descripcion no puede estar vacio');
      if(!isset($_POST['fecha_origen'])) throw new Exception('El campo fecha_origen no puede estar vacio');
      if(!isset($_POST['fecha_destino'])) throw new Exception('El campo fecha_destino no puede estar vacio');
      if(!isset($_POST['precio'])) throw new Exception('El precio no puede estar vacio');

      $id_empresa = $_POST['id_empresa'];
      $nombre = $_POST['nombre_vuelo'];
      $origen = $_POST['origen'];
      $fecha_origen = $_POST['fecha_origen'];
      $destino = $_POST['destino'];
      $fecha_destino = $_POST['fecha_destino'];
      $precio = $_POST['precio'];
      $descripcion_vuelo = $_POST['descripcion_vuelo'];

      $e->createVuelo($id_empresa,$nombre,$origen,$fecha_origen,$destino,
      $fecha_destino,$precio,$descripcion_vuelo);

      $resultado = 'Vuelo creado con exito';
      $vuelos_empresa = $e->getVuelosByEmpresa($id_empresa);
      $nombre_empresa = $emp->getEmpresaById($id_empresa);

      $v = new Administrador();
      $v->vuelos_empresa = $vuelos_empresa;
      $v->id_empresa = $id_empresa;
      $v->nombre_empresa = $nombre_empresa;
      $v->resultado = $resultado;
      $v->render();

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new AgregarVuelo();
      $v->resultado = $resultado;
      $v->render();

    }

  }else if(count($_GET)>0){

    $id_empresa = $_GET['id_empresa'];
    $v = new AgregarVuelo();
    $v->id_empresa = $id_empresa;
    $v->render();

  }

}
