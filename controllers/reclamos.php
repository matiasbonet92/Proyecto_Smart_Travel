<?php

//controllers/misviajes

session_start();

require('../fw/fw.php');
require('../views/Reclamos_Admin.php');
require('../models/Reclamos.php');

$r = new Reclamos();

if(isset($_GET['id_reclamos'])){

	$id_reclamos = $_GET['id_reclamos'];

	$r->eliminarReclamo($id_reclamos);

	$reclamos = $r->getReclamos();

	if (!is_array($reclamos)) {
		$mensaje = 'No tienes reclamos';
		$v = new Reclamos_Admin();
		$v->mensaje = $mensaje;
		$v->render();
	}else{
		$v = new Reclamos_Admin();
		$v->reclamos = $reclamos;
		$v->render();
	}

}elseif(isset($_GET['resolver'])){

	$id_reclamos = $_GET['resolver'];

	$r->updateEstado($id_reclamos);

	$reclamos = $r->getReclamos();

	if (!is_array($reclamos)) {
		$mensaje = 'No tienes reclamos';
		$v = new Reclamos_Admin();
		$v->mensaje = $mensaje;
		$v->render();
	}else{
		$v = new Reclamos_Admin();
		$v->reclamos = $reclamos;
		$v->render();
	}

}elseif (isset($_GET['filtro'])) {

	$filtro = $_GET['filtro'];

	if ($filtro=='asignado') {

		$reclamosAsignados = $r->getReclamosByEstado('A');

	  if (!is_array($reclamosAsignados)) {
	    $mensaje = 'No tienes reclamos asignados';
	    $v = new Reclamos_Admin();
	    $v->mensaje = $mensaje;
	    $v->render();
	  }else{
	  	$v = new Reclamos_Admin();
	  	$v->reclamos = $reclamosAsignados;
	  	$v->render();
	  }

	}elseif ($filtro=='resuelto') {

		$reclamosResueltos = $r->getReclamosByEstado('R');

	  if (!is_array($reclamosResueltos)) {
	    $mensaje = 'No tienes reclamos resueltos';
	    $v = new Reclamos_Admin();
	    $v->mensaje = $mensaje;
	    $v->render();
	  }else{
	  	$v = new Reclamos_Admin();
	  	$v->reclamos = $reclamosResueltos;
	  	$v->render();
	  }

	}elseif ($filtro=='todo') {

		$reclamos = $r->getReclamos();

	  if (!is_array($reclamos)) {
	    $mensaje = 'No tienes reclamos';
	    $v = new Reclamos_Admin();
	    $v->mensaje = $mensaje;
	    $v->render();
	  }else{
	  	$v = new Reclamos_Admin();
	  	$v->reclamos = $reclamos;
	  	$v->render();
	  }

	}

}else{

	$reclamos = $r->getReclamos();

  if (!is_array($reclamos)) {
    $mensaje = 'No tienes reclamos';
    $v = new Reclamos_Admin();
    $v->mensaje = $mensaje;
    $v->render();
  }else{
  	$v = new Reclamos_Admin();
  	$v->reclamos = $reclamos;
  	$v->render();
  }

}
?>
