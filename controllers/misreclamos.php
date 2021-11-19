<?php

//controllers/misviajes

session_start();

require('../fw/fw.php');
require('../views/Mis_Reclamos.php');
require('../models/Reclamos.php');

$r = new Reclamos();

$dni = $_SESSION['dni'];

if (count($_GET)>0) {

		$error = false;

		try {
			if(!isset($_GET['id_reclamos'])) throw new Exception('El campo id_reclamos no puede estar vacio');
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

		} catch (Exception $err) {
			$error = true;
			$resultado = $err->getMessage();
		}

		if ($error) {
			$reclamos = $r->getReclamosByDni($dni);

		  if (!is_array($reclamos)) {
		    $mensaje = 'No tienes reclamos realizados';
		    $v = new Mis_Reclamos();
		    $v->mensaje = $mensaje;
		    $v->render();
		  }else{
		  	$v = new Mis_Reclamos();
		  	$v->reclamos = $reclamos;
				$v->mensaje = $resultado;
		  	$v->render();
		  }
		}

}elseif ($_SESSION['dni']==0) {

	$mensaje = 'Debe completar sus datos personales para poder acceder a sus reclamos realizados';

  header("Location: ../controllers/perfil.php?mensaje=$mensaje");
  exit;

}elseif(isset($dni)){
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
