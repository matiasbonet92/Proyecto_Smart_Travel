<?php

//controllers/reclamos

session_start();

require('../fw/fw.php');
require('../views/Mis_Viajes.php');
require('../views/AgregarReclamo.php');
require('../models/Reclamos.php');
require('../models/Reservas.php');


$r = new Reclamos();
$re = new Reservas();


if (count($_GET)>0) {

		// LLego por primera vez y debo pintar el form
		$id_reserva = $_GET['id_reserva'];

		$v = new AgregarReclamo();
		$v->id_reserva = $id_reserva;
		$v->render();

	}else{

		if(count($_POST)>0){

			$error = false;

			try {

				if(!isset($_POST['descripcion'])) throw new Exception('El campo descripcion no puede estar vacio');
	      if(!isset($_POST['asunto'])) throw new Exception('El campo asunto no puede estar vacio');
	      if(!isset($_POST['id_reserva'])) throw new Exception('El campo id_reserva no puede estar vacio');
				$descripcion = $_POST['descripcion'];
				$asunto = $_POST['asunto'];
				$id_reserva = $_POST['id_reserva'];

				$r->createReclamo( $id_reserva, $descripcion, $asunto);
				$reservas = $re->getReservasByDni($_SESSION['dni']);
				$resultado = 'Reclamo realizado con éxito';

				$v = new Mis_Viajes();
				$v->reservas = $reservas;
				$v->resultado = $resultado;
				$v->render();

			} catch (Exception $err) {

				$error = true;
				$resultado = $err->getMessage();

			}

			if($error){

				$resultado = 'No se logró realizar el reclamo, por favor reintente';

				$v = new Mis_Viajes();
				$v->reservas = $reservas;
				$v->resultado = $resultado;
				$v->render();

			}

		}
}








?>
