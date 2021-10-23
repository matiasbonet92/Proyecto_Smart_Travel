<?php

  class Reservas extends Model {

    public function getReservas(){
      $this->db->query("SELECT * FROM reservas");
      return $this->db->fetchAll();
    }

    public function consultarCantidadPasajerosVuelo($id_vuelo){
      $this->db->query("SELECT SUM(cant_pasajeros) as pasajeros_actual
                        FROM reservas
                        WHERE id_vuelos='$id_vuelo'
                        GROUP BY cant_pasajeros");
      return $this->db->fetchAll();
    }

    public function crearReserva($dni,$id_vuelo,$cant_pasajeros){
      $this->db->query("INSERT INTO reservas (dni,id_vuelos,cant_pasajeros)
                        VALUES ('$dni','$id_vuelo','$cant_pasajeros')");

      $this->db->query("SELECT * FROM reservas WHERE dni='$dni' AND id_vuelos='$id_vuelo'");

      if ($this->db->numRows()==1) {
        return 'Reserva realizada con exito! Buen Viaje!';
      }else{
        return 'Error en la reserva: Ya hay una reserva con este usuario para este vuelo';
      }

    }

  }


 ?>
