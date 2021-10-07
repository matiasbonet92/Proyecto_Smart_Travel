<?php

// controllers/listaproductos

require('../fw/fw.php');
require('../views/ListaEmpresas.php');
require('../models/Empresas.php');

$e = new Empresas();
$empresas = $e->getEmpresas();

$v = new ListaEmpresas();
$v->empresas = $empresas;
$v->render();
