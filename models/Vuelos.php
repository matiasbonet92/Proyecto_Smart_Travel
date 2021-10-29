<?php

  class Vuelos extends Model {

    public function getVuelos(){
      $this->db->query("SELECT * FROM vuelos");
      return $this->db->fetchAll();
    }

    public function getVueloById($id_vuelo){
      $this->db->query("SELECT id_vuelos,v.nombre as nombre_vuelo, origen,fecha_origen,destino,fecha_destino,precio,descripcion_vuelo,v.id_empresa as id_empresa,e.nombre as nombre_empresa,contacto,direccion
                        FROM vuelos v LEFT JOIN empresa e ON v.id_empresa=e.id_empresa
                        WHERE id_vuelos='$id_vuelo'");
      return $this->db->fetchAll();
    }

    public function getVuelosByEmpresa($id){
      $this->db->query("SELECT * FROM vuelos where id_empresa='$id'");
      return $this->db->fetchAll();
    }

    public function getVuelosConPrecioMinimo(){
      $this->db->query("SELECT origen,destino,MIN(precio) as precio_minimo FROM `vuelos` GROUP BY destino");
      return $this->db->fetchAll();
    }

    public function getVuelosDesdeBuscadorSinFecha($origen,$destino){

      $error = false;

      try{
        //Validaciones
        //validar origen (listado strings)
        if (!isset($origen)) throw new Exception('El Origen no puede estar vacio'); //existe?
        if (strlen($origen)<1) throw new Exception('El Origen no puede estar vacio'); //tamaño minimo
        $origen = substr($origen,0,100); //tamaño maximo
        $origen = $this->db->escape($origen); //escapar comillas
        $origen = $this->db->escapeWildcards($origen); //escapa comodines

        //validar destino (listado strings)
        if (!isset($destino)) throw new Exception('El Destino no puede estar vacio'); //existe?
        if (strlen($destino)<1) throw new Exception('El Destino no puede estar vacio'); //tamaño minimo
        $destino = substr($destino,0,100); //tamaño maximo
        $destino = $this->db->escape($destino); //escapar comillas
        $destino = $this->db->escapeWildcards($destino); //escapa comodines

      }catch(Exception $e){
        $error = true;
        $error_mensaje = $e->getMessage();
      }

      if (!$error) {
        $this->db->query("SELECT * FROM vuelos
  							          WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' ");
        return $this->db->fetchAll();
      }else{
        return $error_mensaje;
      }

    }

    public function getVuelosDesdeBuscadorConFecha($origen,$destino,$fecha){

      $error = false;

      try{
        //Validaciones
        //validar origen (listado strings)
        if (!isset($origen)) throw new Exception('El Origen no puede estar vacio'); //existe?
        if (strlen($origen)<1) throw new Exception('El Origen no puede estar vacio'); //tamaño minimo
        $origen = substr($origen,0,100); //tamaño maximo
        $origen = $this->db->escape($origen); //escapar comillas
        $origen = $this->db->escapeWildcards($origen); //escapa comodines

        //validar destino (listado strings)
        if (!isset($destino)) throw new Exception('El Destino no puede estar vacio'); //existe?
        if (strlen($destino)<1) throw new Exception('El Destino no puede estar vacio'); //tamaño minimo
        $destino = substr($destino,0,100); //tamaño maximo
        $destino = $this->db->escape($destino); //escapar comillas
        $destino = $this->db->escapeWildcards($destino); //escapa comodines

        //validar fecha
        $anio = substr($fecha, 0, 4);
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);

        if(!isset($dia)) throw new Exception('La fecha es incorrecta');
        if(!ctype_digit($dia)) throw new Exception('La fecha es incorrecta');
        if($dia<1) throw new Exception('La fecha es incorrecta');
        if($dia>31) throw new Exception('La fecha es incorrecta');
        $dia_ok = $dia;

        if(!isset($mes)) throw new Exception('La fecha es incorrecta');
        if(!ctype_digit($mes)) throw new Exception('La fecha es incorrecta');
        if($mes<1) throw new Exception('La fecha es incorrecta');
        if($mes>12) throw new Exception('La fecha es incorrecta');
        $mes_ok = $mes;

        if(!isset($anio)) throw new Exception('La fecha es incorrecta');
        if(!ctype_digit($anio)) throw new Exception('La fecha es incorrecta');
        if($anio > date("Y") ) throw new Exception('La fecha es incorrecta');
        if($anio < (date("Y")-100) ) throw new Exception('La fecha es incorrecta');
        $anio_ok = $anio;

        if(!checkdate($mes_ok, $dia_ok, $anio_ok)) throw new Exception('La fecha es incorrecta');
        $fecha = $anio_ok.'-'.$mes_ok.'-'.$dia_ok;
      }catch(Exception $error){
        $error = true;
      }

      if (!$error) {
        $this->db->query("SELECT * FROM vuelos
  							          WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' AND fecha_origen = '$fecha' ");
      }else{
        header('Location: ../controllers/principal.php');
        exit;
      }

      return $this->db->fetchAll();
    }

    public function eliminarVuelosByEmpresa($id){
      $this->db->query("DELETE FROM vuelos WHERE id_empresa='$id'");
      return;
    }

  }

 ?>
