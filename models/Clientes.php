<?php

  class Clientes extends Model {

    public function getClientes(){
      $this->db->query("SELECT * FROM clientes");
      return $this->db->fetchAll();
    }
    
  }


 ?>
