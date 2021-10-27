<?php

  class Empresas extends Model {

    public function getEmpresas(){
      $this->db->query("SELECT * FROM empresa");
      return $this->db->fetchAll();
    }

  }


 ?>
