<?php

//controllers/resultado_busqueda
session_start();

require('../fw/fw.php');
require('../views/Resultado_busqueda.php');
require('../views/Principal.php');
require('../models/Vuelos.php');
require('../models/Reservas.php');

$m = new Vuelos();
$res = new Reservas();

if (count($_GET)>0) {

  $origen = $_GET['origen'];
  $destino = $_GET['destino'];
  $max_pax = 200;
  $array = array();

  $resultado_vuelos = $m->getVuelosDesdeBuscadorSinFecha($origen,$destino);

  foreach ($resultado_vuelos as $vuelo) {
    $cant_pasajeros = $res->consultarCantidadPasajerosVuelo($vuelo['id_vuelos']);

    if (isset($cant_pasajeros['0']['pasajeros_actual'])) {
      $cant_restante = ($max_pax - $cant_pasajeros['0']['pasajeros_actual']);
    }else{
      $cant_restante = $max_pax;
    }

    $res_vuelos = array(
                    "cant_restante" => $cant_restante,
                    "resultado_vuelos" => $vuelo
                  );
    array_push($array,$res_vuelos);
  }

  $v = new Resultado_busqueda();
  $v->resultado = $array;
  $v->render();
}

if (count($_POST)>0) {

  $origen = $_POST['origen'];
  $destino = $_POST['destino'];

  if (isset($_POST['no-fecha'])) {
    $resultado_vuelos = $m->getVuelosDesdeBuscadorSinFecha($origen,$destino);
  }else{
    $fecha = $_POST['fecha'];
    $resultado_vuelos = $m->getVuelosDesdeBuscadorConFecha($origen,$destino,$fecha);
  }

  if (empty($resultado_vuelos)) {
    $mensaje = 'No existen vuelos que se correspondan con la busqueda';

    $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
    $size_array = count($vuelos_precio_minimo);

    if ($size_array<=4) {
      $v = new Principal();
      $v->mensaje = $mensaje;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }else{
      shuffle($vuelos_precio_minimo);
      $v = new Principal();
      $v->mensaje = $mensaje;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }

  }

  if (is_array($resultado_vuelos)) {

    $max_pax = 200;
    $array = array();

    foreach ($resultado_vuelos as $vuelo) {
      $cant_pasajeros = $res->consultarCantidadPasajerosVuelo($vuelo['id_vuelos']);

      if (isset($cant_pasajeros['0']['pasajeros_actual'])) {
        $cant_restante = ($max_pax - $cant_pasajeros['0']['pasajeros_actual']);
      }else{
        $cant_restante = $max_pax;
      }

      $res_vuelos = array(
                      "cant_restante" => $cant_restante,
                      "resultado_vuelos" => $vuelo
                    );
      array_push($array,$res_vuelos);
    }

    $v = new Resultado_busqueda();
    $v->resultado = $array;
    $v->render();

  }else{

    $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
    $size_array = count($vuelos_precio_minimo);

    if ($size_array<=4) {
      $v = new Principal();
      $v->mensaje = $resultado_vuelos;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }else{
      shuffle($vuelos_precio_minimo);
      $v = new Principal();
      $v->mensaje = $resultado_vuelos;
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }

  }

}






?>
