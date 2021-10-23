<?php

  // controllers/favorito
  session_start();

  require('../fw/fw.php');
  require('../views/Resultado_busqueda.php');
  require('../views/Ingreso.php');
  require('../models/Vuelos_favoritos.php');

  $vf = new Vuelos_favoritos();

  if (count($_GET)>0) {

    if (isset($_SESSION['logueado'])) {

      if ($_SESSION['dni']==0) {

        $mensaje = 'Debe completar sus datos personales para poder guardar favoritos y realizar reservas';
        $id_vuelo = $_GET['id_vuelo'];
        header("Location: ../controllers/perfil.php?mensaje=$mensaje&id_vuelo=$id_vuelo");
        exit;

      }else{
        $dni = $_SESSION['dni'];
        $id_vuelo = $_GET['id_vuelo'];

        $resultado = $vf->createFavorito($dni,$id_vuelo);

        $v = new Resultado_busqueda();
        $v->resultado = $resultado;
        $v->render();
      }

    }else{
      $v = new Ingreso();
      $v->resultado = 'Por favor, debe ingresar con su usuario para guardar en favoritos';
      $v->estado = $_GET['id_vuelo'];
      $v->render();
    }

  }
