<?php

  // controllers/login
  session_start();

  require('../fw/fw.php');
  require('../views/Ingreso.php');
  require('../models/Usuarios.php');

  $m = new Usuarios();

  if (count($_GET)>0) {

    $v = new Ingreso();
    $v->error = $_GET['error'];
    $v->render();

  }elseif (count($_POST)==3) {

    $mail = $_POST['mail'];
    $clave = $_POST['clave'];
    $login_correcto = $m->getUsuarios($mail,$clave);
    $id_vuelo = $_POST['estado'];

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
      header("Location: ../controllers/favorito.php?id_vuelo=$id_vuelo");
      exit;
    }else{
      header("Location: ../controllers/login.php?error=$login_correcto");
      exit;
    }
    
    }elseif (count($_POST)>0) {       

        $mail = $_POST['mail'];
        $clave = $_POST['clave'];
        $login_correcto = $m->getUsuarios($mail,$clave);

        if (is_array($login_correcto)) {
          foreach ($login_correcto as $data) {
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
          header("Location: ../controllers/login.php?error=$login_correcto");
          exit;
        }
    }else{
        $v = new Ingreso();
        $v->render();         
     }

  

  
