<?php

  class Reclamos extends Model {

    public function getReclamos(){
      $this->db->query("SELECT * FROM reclamos");
      return $this->db->fetchAll();
    }

    public function getReclamosByEstado($estado){
      $this->db->query("SELECT * FROM reclamos WHERE estado='$estado' ");
      return $this->db->fetchAll();
    }

    public function createReclamo($id_reserva,$descripcion,$asunto){

      if(!ctype_digit($id_reserva)) throw new Exception('El campo id_reserva debe ser numerico');
      if(strlen($id_reserva)<1) throw new Exception('El campo id_reserva es muy corto');
      if(strlen($id_reserva)>10) throw new Exception('El campo id_reserva es muy largo');

      if(strlen($descripcion)<1) throw new Exception('El campo descripcion no puede estar vacio');
      if(strlen($descripcion)>500) throw new Exception('El campo descripcion es muy grande');
      $descripcionOk = $this->db->escape($descripcion);


      if(strlen($asunto)<1) throw new Exception('El campo asunto no puede estar vacio');
      if(strlen($asunto)>500) throw new Exception('El campo asunto es muy grande');
      $asuntoOk = $this->db->escape($asunto);


      $this->db->query("INSERT INTO reclamos (id_reserva, descripcion_reclamo, asunto, estado)
                        VALUES ('$id_reserva','$descripcionOk','$asuntoOk', 'A')");
      return;
    }

    public function eliminarReclamo($id){

      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>10) throw new Exception('El campo id es muy largo');


      $this->db->query("DELETE FROM reclamos WHERE id_reclamos='$id'");
      return;
    }

    public function getReclamosByDni($dni){

      if(!ctype_digit($dni)) throw new Exception('El campo dni debe ser numerico');
      if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
      if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');

      $this->db->query("SELECT id_reclamos, rec.id_reserva, descripcion_reclamo, asunto, estado FROM reclamos rec, reservas re
      WHERE rec.id_reserva = re.id_reserva and re.dni = '$dni'");

        if ($this->db->numRows()>0) {
          return $this->db->fetchAll();
        }
    }

    public function updateEstado($id){

      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>10) throw new Exception('El campo id es muy largo');

      $this->db->query("UPDATE reclamos SET estado='R' WHERE id_reclamos='$id' ");
      return;
    }

  }


 ?>
