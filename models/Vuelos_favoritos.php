<?php

  class Vuelos_favoritos extends Model {

    public function getFavoritos($dni){
      
      $this->db->query("SELECT dni,vf.id_vuelos as id_vuelos,descripcion,nombre,origen,destino,fecha_destino,precio,descripcion_vuelo,id_empresa FROM vuelos_favoritos vf 
                        LEFT JOIN vuelos v ON vf.id_vuelos=v.id_vuelos 
                        WHERE dni='$dni'");

      if ($this->db->numRows()>0) {
        return $this->db->fetchAll();
      }
      
    }

    public function createFavorito($dni,$id_vuelo){
      $this->db->query("SELECT * FROM vuelos_favoritos WHERE dni='$dni' AND id_vuelos='$id_vuelo'");

      if ($this->db->numRows()==1) {
        return 'El vuelo ya existe dentro de los favoritos';
      }else{
        $this->db->query("INSERT INTO vuelos_favoritos (dni,id_vuelos)
                          VALUES ('$dni','$id_vuelo')");
        return 'Vuelo favorito creado con exito';
      }
    }

    public function deleteFavorito($dni,$id_vuelo){

      $this->db->query("DELETE FROM vuelos_favoritos WHERE dni='$dni' AND id_vuelos='$id_vuelo'");

    }
    
  }


 ?>
