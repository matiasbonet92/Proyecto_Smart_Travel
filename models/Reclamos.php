<?php

  class Reclamos extends Model {

    public function getReclamos(){
      $this->db->query("SELECT * FROM reclamos");
      return $this->db->fetchAll();
    }
    
  }


 ?>
