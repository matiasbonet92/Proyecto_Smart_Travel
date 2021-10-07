<?php

  // controllers/menu

  require('../fw/fw.php');
  require('../views/Principal.php');
  require('../models/Vuelos.php');

  $m = new Vuelos();
  $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();

  $v = new Principal();
  $v->vuelos_precio_minimo = $vuelos_precio_minimo;
  $v->render();
