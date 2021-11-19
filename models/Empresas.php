<?php

  class Empresas extends Model {

    public function getEmpresas(){
      $this->db->query("SELECT * FROM empresa");
      return $this->db->fetchAll();
    }

    public function getEmpresaById($id){

      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');

      $this->db->query("SELECT * FROM empresa WHERE id_empresa='$id'");
      return $this->db->fetchAll();
    }

    public function createEmpresa($nombre,$contacto,$direccion){

      if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
      $nombre = $this->db->escape($nombre);

      if(strlen($contacto)<1) throw new Exception('El campo contacto no puede estar vacio');
      if(strlen($contacto)>100) throw new Exception('El campo contacto es muy grande');
      $contacto = $this->db->escape($contacto);

      if(strlen($direccion)<1) throw new Exception('El campo direccion no puede estar vacio');
      if(strlen($direccion)>100) throw new Exception('El campo direccion es muy grande');
      $direccion = $this->db->escape($direccion);

      $this->db->query("INSERT INTO empresa (nombre,contacto,direccion)
                        VALUES ('$nombre','$contacto','$direccion')");
      return;

    }

    public function editarEmpresa($id,$nombre,$contacto,$direccion){

      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');

      if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
      $nombre = $this->db->escape($nombre);

      if(strlen($contacto)<1) throw new Exception('El campo contacto no puede estar vacio');
      if(strlen($contacto)>100) throw new Exception('El campo contacto es muy grande');
      $contacto = $this->db->escape($contacto);

      if(strlen($direccion)<1) throw new Exception('El campo direccion no puede estar vacio');
      if(strlen($direccion)>100) throw new Exception('El campo direccion es muy grande');
      $direccion = $this->db->escape($direccion);

      $this->db->query("UPDATE empresa
                        SET nombre='$nombre',contacto='$contacto',direccion='$direccion'
                        WHERE id_empresa='$id'");
      return;

    }

    public function eliminarEmpresa($id){

      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');

      $this->db->query("DELETE FROM empresa WHERE id_empresa='$id'");
      return;
    }

  }


 ?>
