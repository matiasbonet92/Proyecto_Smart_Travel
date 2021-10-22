<?php  

class Usuarios extends Model{

  public function getUsuariobyId($id_login){

      $this->db->query("SELECT * FROM usuarios 
                          WHERE id_login='$id_login'");

      return $this->db->fetchAll();
  }

	public function getUsuarios($mail,$clave){

      $error = false;
      //validacion datos del usuario
      try{
        if(!isset($mail)) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        $mail = $this->db->escape($mail);
        $mail = $this->db->escapeWildcards($mail);

        if(!isset($clave)) throw new Exception('El campo clave no puede estar vacio');
        if(strlen($clave)<1) throw new Exception('El campo clave no puede estar vacio');
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

        if(!isset($nombre)) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
        $nombre = $this->db->escape($nombre);
        $nombre = $this->db->escapeWildcards($nombre);

        if(!isset($mail)) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        $mail = $this->db->escape($mail);
        $mail = $this->db->escapeWildcards($mail);

        if(!isset($clave)) throw new Exception('El campo clave no puede estar vacio');
        if(strlen($clave)<1) throw new Exception('El campo clave no puede estar vacio');
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

        if(!isset($nombre)) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
        if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
        $nombre = $this->db->escape($nombre);
        $nombre = $this->db->escapeWildcards($nombre);

        if(!isset($apellido)) throw new Exception('El campo apellido no puede estar vacio');
        if(strlen($apellido)<1) throw new Exception('El campo apellido no puede estar vacio');
        if(strlen($apellido)>100) throw new Exception('El campo apellido es muy grande');
        $apellido = $this->db->escape($apellido);
        $apellido = $this->db->escapeWildcards($apellido);

        if(!isset($mail)) throw new Exception('El campo mail no puede estar vacio');
        if(strlen($mail)<1) throw new Exception('El campo mail no puede estar vacio');
        $mail = $this->db->escape($mail);
        $mail = $this->db->escapeWildcards($mail);

        if(!isset($dni)) throw new Exception('El campo dni no puede estar vacio');
        if(!is_numeric($dni)) throw new Exception('El campo dni debe ser numerico');
        if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
        if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');
        $dni = $this->db->escape($dni);
        $dni = $this->db->escapeWildcards($dni);

        if(!isset($direccion)) throw new Exception('El campo direccion no puede estar vacio');
        if(strlen($direccion)<1) throw new Exception('El campo direccion no puede estar vacio');
        if(strlen($direccion)>100) throw new Exception('El campo direccion es muy grande');
        $direccion = $this->db->escape($direccion);
        $direccion = $this->db->escapeWildcards($direccion);

        if(!isset($telefono)) throw new Exception('El campo telefono no puede estar vacio');
        if(!is_numeric($telefono)) throw new Exception('El campo telefono debe ser numerico');
        if(strlen($telefono)<1) throw new Exception('El campo telefono es muy corto');
        if(strlen($telefono)>10) throw new Exception('El campo telefono es muy largo');
        $telefono = $this->db->escape($telefono);
        $telefono = $this->db->escapeWildcards($telefono);

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