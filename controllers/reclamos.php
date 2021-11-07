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
