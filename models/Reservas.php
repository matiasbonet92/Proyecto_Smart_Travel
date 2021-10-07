<?php

class Reserva extends Model {
  public function getReservas(){
    $this->db->query("SELECT * FROM reservas");
    return $this->db->fetchAll();
  }
}


 ?>
