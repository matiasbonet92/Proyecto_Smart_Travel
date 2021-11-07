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

			$descripcion = $_POST['descripcion'];
			$asunto = $_POST['asunto'];
			$id_reserva = $_POST['id_reserva'];

			$error = false;

			try {

				$r->createReclamo( $id_reserva, $descripcion, $asunto);

			} catch (Exception $err) {

				$error = true;
				$resultado = $err->getMessage();

			}

			$reservas = $re->getReservasByDni($_SESSION['dni']);

			if($error){

				$resultado = 'No se logró realizar el reclamo, por favor reintente';

				$v = new Mis_Viajes();
				$v->reservas = $reservas;
				$v->resultado = $resultado;
				$v->render();

			}else{
				$resultado = 'Reclamo realizado con éxito';

				$v = new Mis_Viajes();
				$v->reservas = $reservas;
				$v->resultado = $resultado;
				$v->render();

			}
		}
}








?>
