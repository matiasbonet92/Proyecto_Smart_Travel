<?php

// controllers/listaproductos

require('../fw/fw.php');
require('../views/ListaReclamos.php');
require('../models/Reclamos.php');

$m = new Reclamos();
$reclamos = $m->getReclamos();

$v = new ListaReclamos();
$v->reclamos = $reclamos;
$v->render();
