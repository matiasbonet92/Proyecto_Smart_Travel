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

    public function getVuelosDesdeBuscador($origen,$destino,$fecha){

      //Validaciones
      //validar origen (listado strings)
      if (!isset($origen)) die('error1'); //existe?
      if (strlen($origen)<1) die('error2'); //tamaño minimo
      $origen = substr($origen,0,100); //tamaño maximo
      $origen = $this->db->escape($origen); //escapar comillas
      $origen = $this->db->escapeWildcards($origen); //escapa comodines

      //validar destino (listado strings)
      if (!isset($destino)) die('error1'); //existe?
      if (strlen($destino)<1) die('error2'); //tamaño minimo
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

      $this->db->query("SELECT * FROM vuelos
							          WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' AND fecha_origen = '$fecha' ");

      return $this->db->fetchAll();
    }

  }

 ?>
