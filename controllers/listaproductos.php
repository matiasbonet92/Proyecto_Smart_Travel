<?php

// controllers/listaproductos 

require('../fw/fw.php');
require('../views/ListaProductos.php');
require('../models/Productos.php');

$m = new Productos();
$productos = $m->getProductos();

$v = new ListaProductos();
$v->productos = $productos;
$v->render();
