<?php

// controllers/listaproductos

require('../fw/fw.php');
require('../views/ListaClientes.php');
require('../models/Clientes.php');

$c = new Clientes();
$c = $m->getClientes();

$v = new ListaClientes();
$v->clientes = $clientes;
$v->render();
