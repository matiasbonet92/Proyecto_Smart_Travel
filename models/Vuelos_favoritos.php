<?php

  class Vuelos_favoritos extends Model {

    public function getFavoritos(){
      $this->db->query("SELECT * FROM vuelos_favoritos");
      return $this->db->fetchAll();
    }
    
  }


 ?>
