<?php

// controllers/reserva
session_start();

require('../fw/fw.php');
require('../views/Reservar.php');
require('../views/Ingreso.php');
require('../views/Principal.php');
require ('../models/Vuelos.php');
require ('../models/Reservas.php');

$m = new Vuelos();
$r = new Reservas();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)>0) {

    $error = false;

    try{

      if(!isset($_POST['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
      if(!isset($_POST['dni'])) throw new Exception('El campo dni no puede estar vacio');
      if(!isset($_POST['cant_pasajeros'])) throw new Exception('El campo cant_pasajeros no puede estar vacio');

      $id_vuelo = $_POST['id_vuelo'];
      $dni = $_POST['dni'];
      $cantidad_pasajeros = $_POST['cant_pasajeros'];
      $max_pasajeros = 200;

      $pasajeros_actual = $r->consultarCantidadPasajerosVuelo($id_vuelo);

      if ($pasajeros_actual==0) {
        $cant_actual = 0;
      }else{
        foreach ($pasajeros_actual as $pasajeros) {
          $cant_actual = $pasajeros['pasajeros_actual'];
        }
      }

      if (($cantidad_pasajeros+$cant_actual)<=$max_pasajeros) {

        $resultado = $r->crearReserva($dni,$id_vuelo,$cantidad_pasajeros);

        $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
        $size_array = count($vuelos_precio_minimo);

        if ($size_array<=4) {
          $v = new Principal();
          $v->mensaje = $resultado;
          $v->vuelos_precio_minimo = $vuelos_precio_minimo;
          $v->render();
        }else{
          shuffle($vuelos_precio_minimo);
          $v = new Principal();
          $v->mensaje = $resultado;
          $v->vuelos_precio_minimo = $vuelos_precio_minimo;
          $v->render();
        }

      }else{
        $error = 'No quedan suficientes lugares para los pasajeros';

        $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
        $size_array = count($vuelos_precio_minimo);

        if ($size_array<=4) {
          $v = new Principal();
          $v->mensaje = $error;
          $v->vuelos_precio_minimo = $vuelos_precio_minimo;
          $v->render();
        }else{
          shuffle($vuelos_precio_minimo);
          $v = new Principal();
          $v->mensaje = $error;
          $v->vuelos_precio_minimo = $vuelos_precio_minimo;
          $v->render();
        }
      }

    }catch(Exception $err){
      $error = true;
      $resultado = $err->getMessage();
    }

    if($error){
      $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
      $size_array = count($vuelos_precio_minimo);

      if ($size_array<=4) {
        $v = new Principal();
        $v->mensaje = $resultado;
        $v->vuelos_precio_minimo = $vuelos_precio_minimo;
        $v->render();
      }else{
        shuffle($vuelos_precio_minimo);
        $v = new Principal();
        $v->mensaje = $resultado;
        $v->vuelos_precio_minimo = $vuelos_precio_minimo;
        $v->render();
      }
    }


  }elseif (count($_GET)>0 ) {

    $error = false;

    try{

      if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
      $id_vuelo = $_GET['id_vuelo'];

      if (isset($_GET['redireccion'])) {
        $redireccion = $_GET['redireccion'];
      }
      $dni = $_SESSION['dni'];

      if (!isset($dni)) {
        $mensaje = 'Debe completar sus datos personales para poder guardar favoritos y realizar reservas';

        header("Location: ../controllers/perfil.php?mensaje=$mensaje&id_vuelo=$id_vuelo&redireccion=$redireccion");
        exit;
      }else{
        $datos_vuelo = $m->getVueloById($id_vuelo);

        $max_pax = 200;

        $cant_pasajeros = $r->consultarCantidadPasajerosVuelo($id_vuelo);

        if (isset($cant_pasajeros['0']['pasajeros_actual'])) {
          $cant_restante = $max_pax - $cant_pasajeros['0']['pasajeros_actual'];
        }else{
          $cant_restante = $max_pax;
        }

        $v = new Reservar();
        $v->id_vuelo = $id_vuelo;
        $v->datos_vuelo = $datos_vuelo;
        $v->cant_restante = $cant_restante;
        $v->dni = $dni;
        $v->render();
      }

    }catch(Exception $err){
      $error = true;
      $resultado = $err->getMessage();
    }

    if($error){

      $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
      $size_array = count($vuelos_precio_minimo);

      if ($size_array<=4) {
        $v = new Principal();
        $v->mensaje = $resultado;
        $v->vuelos_precio_minimo = $vuelos_precio_minimo;
        $v->render();
      }else{
        shuffle($vuelos_precio_minimo);
        $v = new Principal();
        $v->mensaje = $resultado;
        $v->vuelos_precio_minimo = $vuelos_precio_minimo;
        $v->render();
      }

    }

  }

}else{

  $v = new Ingreso();
  $v->mensaje = 'Por favor, debe ingresar con su usuario para reservar el vuelo';
  $v->estado = $_GET['id_vuelo'];
  $v->redireccion = 'reserva';
  $v->render();

}
