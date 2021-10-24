<?php

  // controllers/menu
  session_start();

  require('../fw/fw.php');
  require('../views/Principal.php');
  require('../models/Vuelos.php');
  require('../models/Vuelos_favoritos.php');

  $m = new Vuelos();
  $fav = new Vuelos_favoritos();

  if (isset($_SESSION['logueado'])) {
    $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();
    if (!isset($_SESSION['dni'])) {
      $v = new Principal();
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->render();
    }else{
      $favoritos = $fav->getFavoritos($_SESSION['dni']);

      $v = new Principal();
      $v->vuelos_precio_minimo = $vuelos_precio_minimo;
      $v->favoritos = $favoritos;
      $v->render();
    }

  }else{
    $vuelos_precio_minimo = $m->getVuelosConPrecioMinimo();

    $v = new Principal();
    $v->vuelos_precio_minimo = $vuelos_precio_minimo;
    $v->render();
  }
