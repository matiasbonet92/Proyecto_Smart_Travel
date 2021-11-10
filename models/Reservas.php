<?php

  class Reservas extends Model {

    public function getReservas(){
      $this->db->query("SELECT * FROM reservas");
      return $this->db->fetchAll();
    }

    public function getReservasByDni($dni){

      $this->db->query("SELECT id_reserva,r.dni as dni,r.id_vuelos as id_vuelos,cant_pasajeros,v.nombre as nombre_vuelo,v.origen,v.fecha_origen,v.destino,v.fecha_destino,v.precio,v.descripcion_vuelo,e.nombre as nombre_empresa,e.contacto
                        FROM reservas r
                        LEFT JOIN vuelos v ON r.id_vuelos=v.id_vuelos
                        LEFT JOIN empresa e ON v.id_empresa=e.id_empresa
                        WHERE r.dni='$dni' ");
      return $this->db->fetchAll();
    }

    public function consultarCantidadPasajerosVuelo($id_vuelo){
      $this->db->query("SELECT SUM(cant_pasajeros) as pasajeros_actual
                        FROM reservas
                        WHERE id_vuelos='$id_vuelo' ");

        if ($this->db->numRows()==0) {
          return 0;
        }else{
          return $this->db->fetchAll();
        }
    }

    public function crearReserva($dni,$id_vuelo,$cant_pasajeros){

      $this->db->query("INSERT INTO reservas (dni,id_vuelos,cant_pasajeros)
                            VALUES ('$dni','$id_vuelo','$cant_pasajeros')");

      $this->db->query("SELECT * FROM reservas WHERE dni='$dni' AND id_vuelos='$id_vuelo'");

      if ($this->db->numRows()>0) {
        return 'Reserva realizada con exito! Buen Viaje!';
      }

    }

    public function deleteReserva($id){
      $this->db->query("DELETE FROM reservas WHERE id_reserva='$id' ");
    }

  }


 ?>
