<?php

  class Vuelos_favoritos extends Model {

    public function getFavoritos($dni){

      if(!ctype_digit($dni)) throw new Exception('El campo dni debe ser numerico');
      if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
      if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');


      $this->db->query("SELECT dni,vf.id_vuelos as id_vuelos,nombre,origen,destino,fecha_origen,fecha_destino,precio,descripcion_vuelo,id_empresa FROM vuelos_favoritos vf
                          LEFT JOIN vuelos v ON vf.id_vuelos=v.id_vuelos
                          WHERE dni='$dni'");

      return $this->db->fetchAll();

    }

    public function createFavorito($dni,$id_vuelo){

      if(!ctype_digit($id_vuelo)) throw new Exception('El campo id_vuelo debe ser numerico');
      if(strlen($id_vuelo)<1) throw new Exception('El campo id_vuelo es muy corto');
      if(strlen($id_vuelo)>10) throw new Exception('El campo id_vuelo es muy largo');


      if(!ctype_digit($dni)) throw new Exception('El campo dni debe ser numerico');
      if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
      if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');


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

      if(!ctype_digit($id_vuelo)) throw new Exception('El campo id_vuelo debe ser numerico');
      if(strlen($id_vuelo)<1) throw new Exception('El campo id_vuelo es muy corto');
      if(strlen($id_vuelo)>10) throw new Exception('El campo id_vuelo es muy largo');


      if(!ctype_digit($dni)) throw new Exception('El campo dni debe ser numerico');
      if(strlen($dni)<1) throw new Exception('El campo dni es muy corto');
      if(strlen($dni)>10) throw new Exception('El campo dni es muy largo');


      $this->db->query("DELETE FROM vuelos_favoritos WHERE dni='$dni' AND id_vuelos='$id_vuelo'");

    }

  }


 ?>
