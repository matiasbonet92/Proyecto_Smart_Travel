<?php

// controllers/listaproductos

require('../fw/fw.php');
require('../views/ListaVuelos.php');
require('../models/Vuelos.php');

$m = new Productos();
$vuelos = $m->getVuelos();

$v = new ListaVuelos();
$v->vuelos = $vuelos;
$v->render();
