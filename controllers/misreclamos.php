<?php

//controllers/misviajes

session_start();

require('../fw/fw.php');
require('../views/Mis_Reclamos.php');
require('../models/Reclamos.php');

$r = new Reclamos();

$dni = $_SESSION['dni'];

if (count($_GET)>0) {

		$id_reclamos = $_GET['id_reclamos'];

		$r->eliminarReclamo($id_reclamos);

		$reclamos = $r->getReclamosByDni($dni);

	  if (!is_array($reclamos)) {
	    $mensaje = 'No tienes reclamos realizados';
	    $v = new Mis_Reclamos();
	    $v->mensaje = $mensaje;
	    $v->render();
	  }else{
	  	$v = new Mis_Reclamos();
	  	$v->reclamos = $reclamos;
	  	$v->render();
	  }

}elseif ($_SESSION['dni']==0) {

	$mensaje = 'Debe completar sus datos personales para poder acceder a sus reclamos realizados';

  header("Location: ../controllers/perfil.php?mensaje=$mensaje");
  exit;

}else{
  $reclamos = $r->getReclamosByDni($dni);

  if (!is_array($reclamos)) {
    $mensaje = 'No tienes reclamos realizados';
    $v = new Mis_Reclamos();
    $v->mensaje = $mensaje;
    $v->render();
  }else{
  	$v = new Mis_Reclamos();
  	$v->reclamos = $reclamos;
  	$v->render();
  }

}







?>
