<?php

//controllers/info_vuelo
session_start();

require('../fw/fw.php');
require('../views/Informacion_Vuelo.php');
require('../views/Principal.php');
require('../models/Vuelos.php');

$m = new Vuelos();

if (count($_GET)>0) {

  $error = false;

  try {

    if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
    $id_vuelo = $_GET['id_vuelo'];

    $datos_vuelo = $m->getVueloById($id_vuelo);

    $v = new Informacion_Vuelo();
    $v->datos_vuelo = $datos_vuelo;
    $v->render();

  } catch (Exception $err) {
    $error = true;
    $resultado = $err->getMessage();
  }

  if($error){

    $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
    $size_array = count($vuelos_precio_minimo);

    if ($size_array<=4) {
      $v = new Principal();
      $v->mensaje = $resultado;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }else{
      shuffle($vuelos_precio_minimo);
      $v = new Principal();
      $v->mensaje = $resultado;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }

  }

}

?>
