<?php

// controllers/reserva
session_start();

require('../fw/fw.php');
require('../views/Reservar.php');
require('../views/Ingreso.php');
require('../views/Resultado_Reserva.php');
require ('../models/Vuelos.php');
require ('../models/Reservas.php');

$m = new Vuelos();
$r = new Reservas();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)==4) {

    $id_vuelo = $_POST['id_vuelo'];
    $dni = $_POST['dni'];
    $cantidad_pasajeros = $_POST['cant_pasajeros'];
    $max_pasajeros = 200;

    $pasajeros_actual = $r->consultarCantidadPasajerosVuelo($id_vuelo);
    foreach ($pasajeros_actual as $pasajeros) {
      $cant_actual = $pasajeros['pasajeros_actual'];
    }

    if (($cantidad_pasajeros+$cant_actual)<=$max_pasajeros) {

      $creacion = $r->crearReserva($dni,$id_vuelo,$cantidad_pasajeros);

      $v = new Resultado_Reserva();
      $v->mensaje = $creacion;
      $v->render();
    }else{
      $error = 'No quedan suficientes lugares para los pasajeros';

      $v = new Resultado_Reserva();
      $v->mensaje = $error;
      $v->render();
    }

  }elseif (count($_GET)>0 ) {

    $id_vuelo = $_GET['id_vuelo'];
    $dni = $_SESSION['dni'];

    $datos_vuelo = $m->getVueloById($id_vuelo);

    $v = new Reservar();
    $v->id_vuelo = $id_vuelo;
    $v->datos_vuelo = $datos_vuelo;
    $v->dni = $dni;
    $v->render();

  }

}else{

  $v = new Ingreso();
  $v->resultado = 'Por favor, debe ingresar con su usuario para reservar el vuelo';
  $v->estado = $_GET['id_vuelo'];
  $v->mensaje = 'reserva';
  $v->render();

}
