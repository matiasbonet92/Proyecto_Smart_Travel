<?php

// controllers/menu

require('../fw/fw.php');
require('../views/Menu.php');
require('../models/Vuelos.php');

$m = new Vuelos();
$vuelos = $m->getVuelos();

$v = new Menu();
$v->vuelos = $vuelos;
$v->render();
