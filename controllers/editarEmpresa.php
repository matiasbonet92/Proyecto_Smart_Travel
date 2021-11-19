<?php

//controllers/agregarEmpresa
session_start();

require('../fw/fw.php');
require('../views/EditarEmpresa.php');
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
      if(!isset($_POST['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');
      $nombre = $_POST['nombre'];
      $contacto = $_POST['contacto'];
      $direccion = $_POST['direccion'];
      $id = $_POST['id_empresa'];

      $e->editarEmpresa($id,$nombre,$contacto,$direccion);
      $resultado = 'Empresa ' . $nombre . ' modificada con exito';
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

      $v = new EditarEmpresa();
      $v->resultado = $resultado;
      $v->render();

    }

  }elseif(count($_GET)>0){

    try {

      if(!isset($_POST['id_empresa'])) throw new Exception('El campo id_empresa no puede estar vacio');
      $id = $_GET['id_empresa'];
      $datos = $e->getEmpresaById($id);

      $v = new EditarEmpresa();
      $v->datos_empresa = $datos;
      $v->render();

    } catch (Exception $e) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {
      $v = new EditarEmpresa();
      $v->resultado = $resultado;
      $v->render();
    }

  }

}
