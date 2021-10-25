<?php

//controllers/info_vuelo
session_start();

require('../fw/fw.php');
require('../views/Informacion_Vuelo.php');
require('../models/Vuelos.php');

$m = new Vuelos();

if (count($_GET)>0) {

  $id_vuelo = $_GET['id_vuelo'];

  $datos_vuelo = $m->getVueloById($id_vuelo);

  $v = new Informacion_Vuelo();
  $v->datos_vuelo = $datos_vuelo;
  $v->render();

}

?>
