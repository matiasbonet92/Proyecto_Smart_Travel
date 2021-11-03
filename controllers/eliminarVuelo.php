<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/Administrador.php');
require('../models/Empresas.php');
require('../models/Vuelos.php');


$vuelos = new Vuelos();

if (isset($_SESSION['logueado'])) {

  if(count($_GET)>0){

    $id_vuelo = $_GET['id_vuelo'];
    $id_empresa = $_GET['id_empresa'];
    $vuelos->eliminarVuelo($id_vuelo);

    $datos = $vuelos->getVuelosByEmpresa($id_empresa);
    $resultado = 'Vuelo eliminado con exito';

    $v = new Administrador();
    $v->vuelos_empresa = $datos;
    $v->resultado = $resultado;
    $v->render();

  }

}
