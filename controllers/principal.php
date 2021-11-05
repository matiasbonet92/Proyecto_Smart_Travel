<?php

  // controllers/menu
  session_start();

  require('../fw/fw.php');
  require('../views/Principal.php');
  require('../models/Vuelos.php');

  $m = new Vuelos();

  $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
  $size_array = count($vuelos_precio_minimo);

  if ($size_array<=4) {
    $v = new Principal();
    $v->vuelos_precio_minimo = $vuelos_precio_minimo;
    $v->render();
  }else{
    shuffle($vuelos_precio_minimo);
    $v = new Principal();
    $v->vuelos_precio_minimo = $vuelos_precio_minimo;
    $v->render();
  }
