<?php

//controllers/misviajes

session_start();

require('../fw/fw.php');
require('../views/Mis_Viajes.php');
require('../models/Reservas.php');

$r = new Reservas();

if (count($_GET)>0) {

		$id_reserva = $_GET['id_reserva'];

		$r->deleteReserva($id_reserva);

		$reservas = $r->getReservasByDni($_SESSION['dni']);

	  if (!is_array($reservas)) {
	    $mensaje = 'No tienes vuelos reservados';
	    $v = new Mis_Viajes();
	    $v->mensaje = $mensaje;
	    $v->render();
	  }else{
	  	$v = new Mis_Viajes();
	  	$v->reservas = $reservas;
	  	$v->render();
	  }

}elseif ($_SESSION['dni']==0) {

	$mensaje = 'Debe completar sus datos personales para poder acceder a sus viajes reservados';

  header("Location: ../controllers/perfil.php?mensaje=$mensaje");
  exit;

}else{
  $reservas = $r->getReservasByDni($_SESSION['dni']);

  if (!is_array($reservas)) {
    $mensaje = 'No tienes vuelos reservados';
    $v = new Mis_Viajes();
    $v->mensaje = $mensaje;
    $v->render();
  }else{
  	$v = new Mis_Viajes();
  	$v->reservas = $reservas;
  	$v->render();
  }

}







?>
