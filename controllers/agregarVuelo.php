<?php

//controllers/agregarVuelo
session_start();

require('../fw/fw.php');
require('../views/AgregarVuelo.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');


$e = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)>0) {
    $id_empresa = $_POST['id_empresa'];
    $nombre = $_POST['nombre_vuelo'];
    $origen = $_POST['origen'];
    $fecha_origen = $_POST['fecha_origen'];
    $destino = $_POST['destino'];
    $fecha_destino = $_POST['fecha_destino'];
    $precio = $_POST['precio'];
    $descripcion_vuelo = $_POST['descripcion_vuelo'];

    $error = false;

    try {

      $e->createVuelo($id_empresa,$nombre,$origen,$fecha_origen,$destino,
      $fecha_destino,$precio,$descripcion_vuelo);

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new AgregarVuelo();
      $v->resultado = $resultado;
      $v->render();

    }else{
      $resultado = 'Vuelo creado con exito';
      $vuelos_empresa = $e->getVuelosByEmpresa($id_empresa);

      $v = new Administrador();
      $v->vuelos_empresa = $vuelos_empresa;
      $v->id_empresa = $id_empresa;
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
