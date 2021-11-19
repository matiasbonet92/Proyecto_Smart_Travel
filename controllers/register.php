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
  $v->redireccion = $_GET['redireccion'];
  $v->mensaje = $_GET['mensaje'];
  $v->render();

}elseif (count($_GET)>0) {

  $v = new Registro();
  $v->error = $_GET['error'];
  $v->render();

}elseif (count($_POST)>0) {

    $error = false;

    try {

      if(!isset($_POST['mail'])) throw new Exception('El campo mail no puede estar vacio');
      if(!isset($_POST['clave'])) throw new Exception('El campo clave no puede estar vacio');
      if(!isset($_POST['nombre'])) throw new Exception('El campo nombre no puede estar vacio');
      if(!isset($_POST['clave_repetida'])) throw new Exception('El campo clave_repetida no puede estar vacio');
      if ($_POST['mail'] != 'root') {
        $mail = $_POST['mail'];
      }
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

          $id_vuelo = $_POST['estado'];
          $redireccion = $_POST['redireccion'];

          $mensaje = 'Complete sus datos personales ya que son obligatorios para reservar vuelos y guardar favoritos';
          header("Location: ../controllers/perfil.php?mensaje=$mensaje&id_vuelo=$id_vuelo&redireccion=$redireccion");
          exit;

        }

      }else{
          header("Location: ../controllers/register.php?error=Las claves ingresadas no son iguales");
          exit;
      }

    } catch (Exception $err) {

      $error = true;
      $resultado = $err->getMessage();

    }

    if($error){

      if (!isset($mail)) {
        $datos_login = 'El mail root no puede ser dado de alta como usuario';
        header("Location: ../controllers/register.php?error=$datos_login");
        exit;
      }else{
        header("Location: ../controllers/register.php?error=$resultado");
        exit;
      }

    }/*TERMINA*/

}elseif(count($_POST)==0){
  $v = new Registro();
  $v->render();
}




?>
