<?php

//controllers/resultado_busqueda
session_start();

require('../fw/fw.php');
require('../views/Resultado_busqueda.php');
require('../models/Vuelos.php');

$m = new Vuelos();

if (count($_GET)>0) {

  $origen = $_GET['origen'];
  $destino = $_GET['destino'];

  $resultado_vuelos = $m->getVuelosDesdeBuscadorSinFecha($origen,$destino);
  
  $v = new Resultado_busqueda();
  $v->resultado = $resultado_vuelos;
  $v->render();
}

if (count($_POST)>0) {

  $origen = $_POST['origen'];
  $destino = $_POST['destino'];

  if (isset($_POST['no-fecha'])) {
    $resultado_vuelos = $m->getVuelosDesdeBuscadorSinFecha($origen,$destino);
  }else{
    $fecha = $_POST['fecha'];
    $resultado_vuelos = $m->getVuelosDesdeBuscadorConFecha($origen,$destino,$fecha);
  }

  $v = new Resultado_busqueda();
  $v->resultado = $resultado_vuelos;
  $v->render();
}






?>
