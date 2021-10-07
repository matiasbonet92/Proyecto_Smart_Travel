<?php

  // controllers/menu

  require('../fw/fw.php');
  require('../views/Home.php');
  require('../models/Vuelos.php');

  $m = new Vuelos();
  $vuelos = $m->getVuelos();

  $v = new Home();
  $v->vuelos = $vuelos;
  $v->render();
