<?php

//controllers/misfavoritos

session_start();

require('../fw/fw.php');
require('../views/Favoritos.php');
require('../models/Vuelos_favoritos.php');

$vf = new Vuelos_favoritos();

if (count($_GET)>0) {

		$error = false;

		try {

			if(!isset($_GET['dni'])) throw new Exception('El campo dni no puede estar vacio');
			if(!isset($_GET['id_vuelo'])) throw new Exception('El campo id_vuelo no puede estar vacio');
			$dni = $_GET['dni'];
			$id_vuelo = $_GET['id_vuelo'];

			$vf->deleteFavorito($dni,$id_vuelo);

			$favoritos = $vf->getFavoritos($dni);

      if (empty($favoritos)) {
	      $mensaje = 'No tienes vuelos Favoritos';
	      $v = new Favoritos();
	      $v->mensaje = $mensaje;
	      $v->render();
      }else{
      	$v = new Favoritos();
      	$v->favoritos = $favoritos;
      	$v->render();
			}

		} catch (Exception $err) {
			$error = true;
			$resultado = $err->getMessage();
		}

		if ($error) {
			$favoritos = $vf->getFavoritos($_SESSION['dni']);

      if (empty($favoritos)) {
	      $v = new Favoritos();
	      $v->mensaje = $resultado;
	      $v->render();
      }else{
      	$v = new Favoritos();
      	$v->favoritos = $resultado;
      	$v->render();
			}
		}

}elseif ($_SESSION['dni']==0) {

	$mensaje = 'Debe completar sus datos personales para poder guardar y acceder a sus favoritos';

  header("Location: ../controllers/perfil.php?mensaje=$mensaje");
  exit;

}else{
  $favoritos = $vf->getFavoritos($_SESSION['dni']);

  if (empty($favoritos)) {
    $mensaje = 'No tienes vuelos Favoritos';
    $v = new Favoritos();
    $v->mensaje = $mensaje;
    $v->render();
  }else{
  	$v = new Favoritos();
  	$v->favoritos = $favoritos;
  	$v->render();
  }

}

?>
