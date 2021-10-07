<?php

  class Vuelos extends Model {

    public function getVuelos(){
      $this->db->query("SELECT * FROM vuelos");
      return $this->db->fetchAll();
    }

    public function getVuelosConPrecioMinimo(){
      $this->db->query("SELECT origen,destino,MIN(precio) as precio_minimo FROM `vuelos` GROUP BY destino");
      return $this->db->fetchAll();
    }
    
  }

 ?>
