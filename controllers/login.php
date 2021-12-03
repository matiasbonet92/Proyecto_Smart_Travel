<?php

  // controllers/login
  session_start();

  require('../fw/fw.php');
  require('../views/Ingreso.php');
  require('../models/Usuarios.php');

  $m = new Usuarios();

  if (count($_GET)>0) {

    $id_vuelo = $_GET['id_vuelo'];
    $mensaje = $_GET['mensaje'];
    $redireccion = $_GET['redireccion'];

    $v = new Ingreso();
    $v->error = $_GET['error'];
    $v->estado = $id_vuelo;
    $v->mensaje = $mensaje;
    $v->redireccion = $redireccion;
    $v->render();

  }elseif (count($_POST)==5) {

    $error = false;

    try {

      if(!isset($_POST['mail'])) throw new Exception('El campo mail no puede estar vacio');
      if(!isset($_POST['clave'])) throw new Exception('El campo clave no puede estar vacio');
      $mail = $_POST['mail'];
      $clave = $_POST['clave'];
      $login_correcto = $m->getUsuarios($mail,$clave);
      $id_vuelo = $_POST['estado'];
      $mensaje = $_POST['mensaje'];
      $redireccion = $_POST['redireccion'];

      if (is_array($login_correcto)) {

        foreach ($login_correcto as $data) {
          $_SESSION['logueado'] = true;
          $_SESSION['id_login'] = $data['id_login'];
          $_SESSION['mail'] = $data['mail'];
          $_SESSION['dni'] = $data['dni'];
          $_SESSION['nombre'] = $data['nombre'];
          $_SESSION['apellido'] = $data['apellido'];
          $_SESSION['direccion'] = $data['direccion'];
        }

        if ($redireccion == 'favorito') {
          header("Location: ../controllers/favorito.php?id_vuelo=$id_vuelo&redireccion=$redireccion");
          exit;
        }else{
          header("Location: ../controllers/reserva.php?id_vuelo=$id_vuelo&redireccion=$redireccion");
          exit;
        }
        /*ver si viene por el lado de reserva o favorito*/

      }

    } catch (Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if($error){

      $id_vuelo = $_POST['estado'];
      $mensaje = $_POST['mensaje'];
      $redireccion = $_POST['redireccion'];

      header("Location: ../controllers/login.php?error=$resultado&id_vuelo=$id_vuelo&mensaje=$mensaje&redireccion=$redireccion");
      exit;

    }

}elseif (count($_POST)>0) {

        $error = false;

        try {

          if(!isset($_POST['mail'])) throw new Exception('El campo mail no puede estar vacio');
          if(!isset($_POST['clave'])) throw new Exception('El campo clave no puede estar vacio');
          $mail = $_POST['mail'];
          $clave = $_POST['clave'];
          $login_correcto = $m->getUsuarios($mail,$clave);

          if (is_array($login_correcto)) {

            foreach ($login_correcto as $data) {

              if ($data['mail']=='root') {
                $_SESSION['logueado'] = true;
                $_SESSION['id_login'] = $data['id_login'];
                $_SESSION['mail'] = $data['mail'];
                $_SESSION['nombre'] = $data['nombre'];

                header("Location: ../controllers/administrador.php");
                exit;
              }

              $_SESSION['logueado'] = true;
              $_SESSION['id_login'] = $data['id_login'];
              $_SESSION['mail'] = $data['mail'];
              $_SESSION['dni'] = $data['dni'];
              $_SESSION['nombre'] = $data['nombre'];
              $_SESSION['apellido'] = $data['apellido'];
              $_SESSION['direccion'] = $data['direccion'];

              header("Location: ../controllers/principal.php");
              exit;
            }

          }else{
            $v = new Ingreso();
            $v->error = $login_correcto;
            $v->render();
          }

        } catch (Exception $err) {

          $error = true;
          $resultado = $err->getMessage();

        }

        if($error){

          $v = new Ingreso();
          $v->error = $resultado;
          $v->render();

        }

    }else{
        $v = new Ingreso();
        $v->render();
     }
