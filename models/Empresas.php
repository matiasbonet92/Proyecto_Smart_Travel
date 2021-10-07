<?php

  class Empresas extends Model {

    public function getEmpresas(){
      $this->db->query("SELECT * FROM empresas");
      return $this->db->fetchAll();
    }
    
  }


 ?>
