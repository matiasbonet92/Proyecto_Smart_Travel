<?php

class Usuarios extends Model{

  public function getUsuariobyId($id_login){

    if(!ctype_digit($id_login)) throw new Exception('El campo id_login debe ser numerico');
    if(strlen($id_login)<1) throw new Exception('El campo id_login es muy corto');
    if(strlen($id_login)>10) throw new Exception('El campo id_login es muy largo');

      $this->db->query("SELECT * FROM usuarios
                          WHERE id_login='$id_login'");

      return $this->db->fetchAll();
  }

	public function getUsuarios($mail,$clave){

      $error = false;
      //validacion datos del usuario
      try{
        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)>100) throw new Exception('El campo mail es muy largo');
        $mail = $this->db->escape($mail);
        $mail = $this->db->escapeWildcards($mail);

        if(strlen($clave)<1) throw new Exception('El campo clave no puede estar vacio');
        if(strlen($clave)>40) throw new Exception('El campo clave es muy largo');
        $clave = $this->db->escape($clave);
        $clave = $this->db->escapeWildcards($clave);
        $clave = sha1($clave);

      }catch(Exception $e){
        $error = true;
        $error_mensaje= $e->getMessage();
      }

      if (!$error) {
        $this->db->query("SELECT * FROM usuarios
                          WHERE mail LIKE '%$mail%' AND clave LIKE '%$clave%'");

        if ($this->db->numRows()==0) {
          return 'El usuario no existe';
        }else{
          return $this->db->fetchAll();
        }

      }else{
        return $error_mensaje;
      }

    }

    public function createUsuarios($mail,$clave,$nombre){

      $error = false;
      //validacion datos del usuario
      try{

        if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
        $nombre = $this->db->escape($nombre);

        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)>100) throw new Exception('El campo mail es muy grande');
        $mail = $this->db->escape($mail);
        $mail = $this->db->escapeWildcards($mail);

        if(strlen($clave)<1) throw new Exception('El campo clave no puede estar vacio');
        if(strlen($clave)>40) throw new Exception('El campo clave es muy largo');
        $clave = $this->db->escape($clave);
        $clave = $this->db->escapeWildcards($clave);
        $clave = sha1($clave);

      }catch(Exception $e){
        $error = true;
        $error_mensaje= $e->getMessage();
      }

      if (!$error) {

        $this->db->query("SELECT mail FROM usuarios WHERE mail LIKE '%$mail%'");

        $cantidad = $this->db->numRows();
        if ($cantidad>0) {
          return 'El mail ya existe en la base de datos';
        }else{

            $this->db->query("INSERT INTO usuarios (mail,clave,nombre)
                              VALUES ('$mail','$clave','$nombre')");

            $this->db->query("SELECT * FROM usuarios
                                          WHERE mail LIKE '%$mail%' AND clave LIKE '%$clave%'");

            return $this->db->fetchAll();
          }

      }else{
        return $error_mensaje;
      }

    }


    public function updateUsuarios($id_login,$nombre,$apellido,$mail,$dni,$direccion,$telefono){

      $error = false;
      //validacion datos del usuario
      try{

        if(!ctype_digit($id_login)) throw new Exception('El campo id_login debe ser numerico');
        if(strlen($id_login)<1) throw new Exception('El campo id_login es muy corto');
        if(strlen($id_login)>10) throw new Exception('El campo id_login es muy largo');

        if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
        $nombre = $this->db->escape($nombre);

        if(strlen($apellido)<1) throw new Exception('El campo apellido no puede estar vacio');
        if(strlen($apellido)>100) throw new Exception('El campo apellido es muy grande');
        $apellido = $this->db->escape($apellido);

        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)>100) throw new Exception('El campo mail es muy grande');
        $mail = $this->db->escape($mail);

        if(!ctype_digit($dni)) throw new Exception('El campo dni debe ser numerico');
        if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
        if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');

        if(strlen($direccion)<1) throw new Exception('El campo direccion no puede estar vacio');
        if(strlen($direccion)>200) throw new Exception('El campo direccion es muy grande');
        $direccion = $this->db->escape($direccion);

        if(!ctype_digit($telefono)) throw new Exception('El campo telefono debe ser numerico');
        if(strlen($telefono)<1) throw new Exception('El campo telefono es muy corto');
        if(strlen($telefono)>15) throw new Exception('El campo telefono es muy largo');

      }catch(Exception $e){
        $error = true;
        $error_mensaje= $e->getMessage();
      }

      if (!$error) {

        $this->db->query("UPDATE usuarios
                          SET mail='$mail', nombre='$nombre', apellido='$apellido', dni='$dni', direccion='$direccion', telefono='$telefono' WHERE id_login='$id_login'");

        $this->db->query("SELECT * FROM usuarios WHERE id_login='$id_login'");

        $cantidad = $this->db->numRows();
        if ($cantidad==1) {
          return $this->db->fetchAll();
        }

      }else{
        return $error_mensaje;
      }

    }

}

?>
