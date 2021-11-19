<?php

  // controllers/perfil
  session_start();

  require('../fw/fw.php');
  require('../views/Perfil.php');
  require('../models/Usuarios.php');

  $u = new Usuarios();

  if (count($_POST)>0) {

    $error = false;

    try {

      if(!isset($_POST['nombre'])) throw new Exception('El campo nombre no puede estar vacio');
      if(!isset($_POST['apellido'])) throw new Exception('El campo apellido no puede estar vacio');
      if(!isset($_POST['mail'])) throw new Exception('El campo mail no puede estar vacio');
      if(!isset($_POST['dni'])) throw new Exception('El dni descripcion no puede estar vacio');
      if(!isset($_POST['direccion'])) throw new Exception('El campo direccion no puede estar vacio');
      if(!isset($_POST['telefono'])) throw new Exception('El campo telefono no puede estar vacio');
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $mail = $_POST['mail'];
      $dni = $_POST['dni'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $id_login = $_SESSION['id_login'];

      $consulta = $u->updateUsuarios($id_login,$nombre,$apellido,$mail,$dni,$direccion,$telefono);

      foreach ($consulta as $data) {
        $_SESSION['apellido'] = $data['apellido'];
        $_SESSION['dni'] = $data['dni'];
        $_SESSION['direccion'] = $data['direccion'];
        $_SESSION['telefono'] = $data['telefono'];
      }

      $id_vuelo = $_POST['id_vuelo'];
      $redireccion = $_POST['redireccion'];

      if (is_array($consulta)) {
        $v = new Perfil();
        $v->id_login = $id_login;
        $v->mail = $mail;
        $v->nombre = $nombre;
        $v->apellido = $apellido;
        $v->dni = $dni;
        $v->direccion = $direccion;
        $v->telefono = $telefono;
        $v->id_vuelo = $id_vuelo;
        $v->redireccion = $redireccion;
        $v->render();
      }

    } catch (Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if($error){

      $v = new Perfil();
      $v->error = $resultado;
      $v->render();

    }/*TERMINA*/


  }elseif (count($_GET)>0) {

      $mensaje = $_GET['mensaje'];
      $id_vuelo = $_GET['id_vuelo'];
      $redireccion = $_GET['redireccion'];

      $v = new Perfil();
      $v->id_login = $_SESSION['id_login'];
      $v->mail = $_SESSION['mail'];
      $v->nombre = $_SESSION['nombre'];
      $v->mensaje = $mensaje;
      $v->id_vuelo = $id_vuelo;
      $v->redireccion = $redireccion;
      $v->render();

  }elseif (isset($_SESSION['logueado'])) {

      $datos = $u->getUsuariobyId($_SESSION['id_login']);

      foreach ($datos as $dato) {
        $id_login = $dato['id_login'];
        $mail = $dato['mail'];
        $nombre = $dato['nombre'];
        $apellido = $dato['apellido'];
        $dni = $dato['dni'];
        $direccion = $dato['direccion'];
        $telefono = $dato['telefono'];
      }

      $v = new Perfil();
      $v->id_login = $id_login;
      $v->mail = $mail;
      $v->nombre = $nombre;
      $v->apellido = $apellido;
      $v->dni = $dni;
      $v->direccion = $direccion;
      $v->telefono = $telefono;
      $v->render();

    }
