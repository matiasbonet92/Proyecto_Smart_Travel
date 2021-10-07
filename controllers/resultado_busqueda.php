<?php

//controllers/resultado_busqueda
require('../fw/fw.php');
require('../views/Resultado_busqueda.php');
require('../models/Vuelos.php');

$m = new Vuelos();

if (count($_POST)>1) {

  $origen = $_POST['origen'];
  $destino = $_POST['destino'];
  $fecha = $_POST['fecha'];

  $resultado_vuelos = $m->getVuelosDesdeBuscador($origen,$destino,$fecha);

  $v = new Resultado_busqueda();
  $v->resultado = $resultado_vuelos;
  $v->render();
}






?>
