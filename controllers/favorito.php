<?php

  // controllers/favorito
  session_start();

  require('../fw/fw.php');
  require('../views/Principal.php');
  require('../views/Ingreso.php');
  require('../models/Vuelos_favoritos.php');
  require('../models/Vuelos.php');

  $vf = new Vuelos_favoritos();
  $m = new Vuelos();

  if (count($_GET)>0) {

    if (isset($_SESSION['logueado'])) {

      if ($_SESSION['dni']==0) {

        $mensaje = 'Debe completar sus datos personales para poder guardar favoritos y realizar reservas';
        $id_vuelo = $_GET['id_vuelo'];
        header("Location: ../controllers/perfil.php?mensaje=$mensaje&id_vuelo=$id_vuelo");
        exit;

      }else{

        $error = false;

  			try {

  				if(!isset($_SESSION['dni'])) throw new Exception('El campo dni no puede estar vacio');
  	      if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
          $dni = $_SESSION['dni'];
          $id_vuelo = $_GET['id_vuelo'];

          $resultado = $vf->createFavorito($dni,$id_vuelo);

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

  			} catch (Exception $err) {

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

  			}/*Termina*/

    }else{
      $v = new Ingreso();
      $v->mensaje = 'Por favor, debe ingresar con su usuario para guardar en favoritos';
      $v->redireccion = 'favorito';
      $v->estado = $_GET['id_vuelo'];
      $v->render();
    }

  }
