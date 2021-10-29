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

    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $id = $_POST['id_empresa'];
    $error = false;

    try {

      $e->editarEmpresa($id,$nombre,$contacto,$direccion);

    } catch(Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if ($error) {

      $v = new EditarEmpresa();
      $v->resultado = $resultado;
      $v->render();

    }else{
      $resultado = 'Empresa ' . $nombre . ' modificada con exito';
      $empresas = $e->getEmpresas();

      $v = new Administrador();
      $v->empresas = $empresas;
      $v->resultado = $resultado;
      $v->render();
    }

  }elseif(count($_GET)>0){

    $id = $_GET['id_empresa'];
    $datos = $e->getEmpresaById($id);

    $v = new EditarEmpresa();
    $v->datos_empresa = $datos;
    $v->render();

  }

}
