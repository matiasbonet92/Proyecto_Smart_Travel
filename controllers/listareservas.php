<?php

// controllers/listaproductos

require('../fw/fw.php');
require('../views/ListaReservas.php');
require('../models/Reservas.php');

$m = new Reservas();
$productos = $m->getReservas();

$v = new ListaReservas();
$v->reservas = $reservas;
$v->render();
