<?php

class Vuelos extends Model {
  public function getVuelos(){
    $this->db->query("SELECT * FROM vuelos");
    return $this->db->fetchAll();
  }
}


 ?>
