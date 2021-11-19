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

    $error = false;

    try {

      if(!isset($_POST['nombre'])) throw new Exception('El campo nombre no puede estar vacio');
      if(!isset($_POST['contacto'])) throw new Exception('El campo contacto no puede estar vacio');
      if(!isset($_POST['direccion'])) throw new Exception('El campo direccion no puede estar vacio');
      $nombre = $_POST['nombre'];
      $contacto = $_POST['contacto'];
      $direccion = $_POST['direccion'];

      $e->createEmpresa($nombre,$contacto,$direccion);
      $resultado = 'Empresa creada con exito';
      $empresas = $e->getEmpresas();

      $v = new Administrador();
      $v->empresas = $empresas;
      $v->resultado = $resultado;
      $v->render();

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new AgregarEmpresa();
      $v->resultado = $resultado;
      $v->render();

    }

  }else{

    $v = new AgregarEmpresa();
    $v->render();

  }

}
