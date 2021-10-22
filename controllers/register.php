<?php

//controllers/register
session_start();

require('../fw/fw.php');
require('../views/Registro.php');
require('../models/Usuarios.php');

$u = new Usuarios();

if(isset($_GET['id_vuelo'])){

  $v = new Registro();
  $v->id_vuelo = $_GET['id_vuelo'];
  $v->render();

}elseif (count($_GET)>0) {

  $v = new Registro();
  $v->error = $_GET['error'];
  $v->render();

}elseif (count($_POST)>0) {

    $mail = $_POST['mail'];
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $clave_repetida = $_POST['clave_repetida'];

    if ($clave==$clave_repetida) {
      $datos_login = $u->createUsuarios($mail,$clave,$nombre);

      if (is_array($datos_login)) {
        
        $_SESSION['logueado'] = true;
        
        foreach($datos_login as $data){
          $_SESSION['id_login'] = $data['id_login'];
          $_SESSION['mail'] = $data['mail'];
          $_SESSION['nombre'] = $data['nombre'];
        }

        if ($_POST['estado']) {
          header("Location: ../controllers/favorito.php?id_vuelo=$estado");
          exit;
        }

        header("Location: ../controllers/principal.php");
        exit;

      }else{

        header("Location: ../controllers/register.php?error=$datos_login");
        exit;

      }

    }else{

      header("Location: ../controllers/register.php?error=Las claves ingresadas no son iguales");
      exit;
    }

}elseif(count($_POST)==0){
  $v = new Registro();
  $v->render();
}




?>