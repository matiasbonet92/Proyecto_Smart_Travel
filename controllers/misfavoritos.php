<?php

//controllers/misfavoritos

session_start();

require('../fw/fw.php');
require('../views/Favoritos.php');
require('../models/Vuelos_favoritos.php');

$vf = new Vuelos_favoritos();

if (count($_GET)>0) {

		$dni = $_GET['dni'];
		$id_vuelo = $_GET['id_vuelo'];

		$vf->deleteFavorito($dni,$id_vuelo);

		$favoritos = $vf->getFavoritos($dni);

      if (!is_array($favoritos)) {
	      $mensaje = 'No tienes vuelos Favoritos';
	      $v = new Favoritos();
	      $v->mensaje = $mensaje;
	      $v->render();
      }else{
      	$v = new Favoritos();
      	$v->favoritos = $favoritos;
      	$v->render();
			}
}elseif ($_SESSION['dni']==0) {

	$mensaje = 'Debe completar sus datos personales para poder guardar y acceder a sus favoritos';

  header("Location: ../controllers/perfil.php?mensaje=$mensaje");
  exit;

}else{
  $favoritos = $vf->getFavoritos($_SESSION['dni']);

  if (!is_array($favoritos)) {
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
