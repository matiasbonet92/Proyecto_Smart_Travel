<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/AgregarEmpresa.php');
require('../views/Administrador.php');
require('../models/Empresas.php');


$e = new Empresas();

if (isset($_SESSION['logueado'])) {

  if (count($_POST)>0) {

    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $error = false;

    try {

      $e->createEmpresa($nombre,$contacto,$direccion);

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new AgregarEmpresa();
      $v->resultado = $resultado;
      $v->render();

    }else{
      $resultado = 'Empresa creada con exito';
      $empresas = $e->getEmpresas();

      $v = new Administrador();
      $v->empresas = $empresas;
      $v->resultado = $resultado;
      $v->render();
    }

  }else{

    $v = new AgregarEmpresa();
    $v->render();

  }

}
