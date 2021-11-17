<?php

  class Vuelos extends Model {

    public function getVuelos(){
      $this->db->query("SELECT * FROM vuelos");
      return $this->db->fetchAll();
    }

    public function getVueloById($id_vuelo){

      if(!isset($id_vuelo)) throw new Exception('El campo id_vuelo no puede estar vacio');
      if(!ctype_digit($id_vuelo)) throw new Exception('El campo id_vuelo debe ser numerico');
      if(strlen($id_vuelo)<1) throw new Exception('El campo id_vuelo es muy corto');
      if(strlen($id_vuelo)>10) throw new Exception('El campo id_vuelo es muy largo');

      $this->db->query("SELECT id_vuelos,v.nombre as nombre_vuelo, origen,fecha_origen,destino,fecha_destino,precio,descripcion_vuelo,v.id_empresa as id_empresa,e.nombre as nombre_empresa,contacto,direccion
                        FROM vuelos v LEFT JOIN empresa e ON v.id_empresa=e.id_empresa
                        WHERE id_vuelos='$id_vuelo'");
      return $this->db->fetchAll();
    }

    public function createVuelo($id_empresa,$nombre,$origen,$fecha_origen,$destino,
    $fecha_destino,$precio,$descripcion_vuelo){

      if(!isset($id_empresa)) throw new Exception('El campo id_empresa no puede estar vacio');
      if(!ctype_digit($id_empresa)) throw new Exception('El campo id_empresa debe ser numerico');
      if(strlen($id_empresa)<1) throw new Exception('El campo id_empresa es muy corto');
      if(strlen($id_empresa)>11) throw new Exception('El campo id_empresa es muy largo');

      if(!isset($nombre)) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)>50) throw new Exception('El campo nombre es muy grande');
      $nombre = $this->db->escape($nombre);

      if(!isset($origen)) throw new Exception('El campo origen no puede estar vacio');
      if(strlen($origen)<1) throw new Exception('El campo origen no puede estar vacio');
      if(strlen($origen)>100) throw new Exception('El campo origen es muy grande');
      $origen = $this->db->escape($origen);

      if(!isset($destino)) throw new Exception('El campo destino no puede estar vacio');
      if(strlen($destino)<1) throw new Exception('El campo destino no puede estar vacio');
      if(strlen($destino)>100) throw new Exception('El campo destino es muy grande');
      $destino = $this->db->escape($destino);

      if(!isset($descripcion_vuelo)) throw new Exception('El campo descripcion no puede estar vacio');
      if(strlen($descripcion_vuelo)<1) throw new Exception('El campo descripcion no puede estar vacio');
      if(strlen($descripcion_vuelo)>1000) throw new Exception('El campo descripcion es muy grande');
      $descripcion_vuelo = $this->db->escape($descripcion_vuelo);

      //Validacion fecha origen
      $anio = substr($fecha_origen, 0, 4);
      $mes = substr($fecha_origen, 5, 2);
      $dia = substr($fecha_origen, 8, 2);

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
      if($anio > date("Y")+5 ) throw new Exception('No se pueden crear vuelos con fecha de origen posterior a 5 años');
      if($anio < (date("Y")-100) ) throw new Exception('La fecha es incorrecta');
      $anio_ok = $anio;

      if(!checkdate($mes_ok, $dia_ok, $anio_ok)) throw new Exception('La fecha es incorrecta');
      $fecha_origen = $anio_ok.'-'.$mes_ok.'-'.$dia_ok;

      // Validacion fecha destino
      $anio = substr($fecha_destino, 0, 4);
      $mes = substr($fecha_destino, 5, 2);
      $dia = substr($fecha_destino, 8, 2);

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
      if($anio > date("Y")+5 ) throw new Exception('No se pueden crear vuelos con fecha de destino posterior 5 años');
      if($anio < (date("Y")-100) ) throw new Exception('La fecha es incorrecta');
      $anio_ok = $anio;

      if(!checkdate($mes_ok, $dia_ok, $anio_ok)) throw new Exception('La fecha es incorrecta');
      $fecha_destino = $anio_ok.'-'.$mes_ok.'-'.$dia_ok;

      $forigen = new DateTime($fecha_origen);
      $fdestino = new DateTime($fecha_destino);

      if($forigen > $fdestino) throw new Exception('La fecha de destino no puede ser posterior a la de origen');

      if(!isset($precio)) throw new Exception('El precio no puede estar vacio');
      if(!is_numeric($precio)) throw new Exception('El precio debe ser numerico');
      if(strlen($precio)<0) throw new Exception('El precio no puede ser menor a 0');

      $this->db->query("INSERT INTO vuelos (nombre,origen,fecha_origen,destino,fecha_destino,precio,descripcion_vuelo,id_empresa)
                        VALUES ('$nombre','$origen','$fecha_origen','$destino','$fecha_destino','$precio','$descripcion_vuelo','$id_empresa' )");
      return;

    }

    public function editarVuelo($id_empresa,$id_vuelos,$nombre,$origen,$fecha_origen,$destino,
    $fecha_destino,$precio,$descripcion_vuelo){

      if(!isset($id_empresa)) throw new Exception('El campo id_empresa no puede estar vacio');
      if(!ctype_digit($id_empresa)) throw new Exception('El campo id_empresa debe ser numerico');
      if(strlen($id_empresa)<1) throw new Exception('El campo id_empresa es muy corto');
      if(strlen($id_empresa)>11) throw new Exception('El campo id_empresa es muy largo');


      if(!isset($nombre)) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)<1) throw new Exception('El campo nombre no puede estar vacio');
      if(strlen($nombre)>100) throw new Exception('El campo nombre es muy grande');
      $nombre = $this->db->escape($nombre);

      if(!isset($origen)) throw new Exception('El campo origen no puede estar vacio');
      if(strlen($origen)<1) throw new Exception('El campo origen no puede estar vacio');
      if(strlen($origen)>100) throw new Exception('El campo origen es muy grande');
      $origen = $this->db->escape($origen);

      if(!isset($destino)) throw new Exception('El campo destino no puede estar vacio');
      if(strlen($destino)<1) throw new Exception('El campo destino no puede estar vacio');
      if(strlen($destino)>100) throw new Exception('El campo destino es muy grande');
      $destino = $this->db->escape($destino);

      if(!isset($descripcion_vuelo)) throw new Exception('El campo descripcion no puede estar vacio');
      if(strlen($descripcion_vuelo)<1) throw new Exception('El campo descripcion no puede estar vacio');
      if(strlen($descripcion_vuelo)>1000) throw new Exception('El campo descripcion es muy grande');
      $descripcion_vuelo = $this->db->escape($descripcion_vuelo);

      //Validacion fecha origen
      $anio = substr($fecha_origen, 0, 4);
      $mes = substr($fecha_origen, 5, 2);
      $dia = substr($fecha_origen, 8, 2);

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
      if($anio > date("Y")+5 ) throw new Exception('No se pueden editar vuelos con fecha de origen posterior a 5 años');
      if($anio < (date("Y")-100) ) throw new Exception('La fecha es incorrecta');
      $anio_ok = $anio;

      if(!checkdate($mes_ok, $dia_ok, $anio_ok)) throw new Exception('La fecha es incorrecta');
      $fecha_origen = $anio_ok.'-'.$mes_ok.'-'.$dia_ok;

      // Validacion fecha destino
      $anio = substr($fecha_destino, 0, 4);
      $mes = substr($fecha_destino, 5, 2);
      $dia = substr($fecha_destino, 8, 2);

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
      if($anio > date("Y")+5 ) throw new Exception('No se pueden editar vuelos con fecha de destino posterior a 5 años');
      if($anio < (date("Y")-100) ) throw new Exception('La fecha es incorrecta');
      $anio_ok = $anio;

      if(!checkdate($mes_ok, $dia_ok, $anio_ok)) throw new Exception('La fecha es incorrecta');
      $fecha_destino = $anio_ok.'-'.$mes_ok.'-'.$dia_ok;

      $forigen = new DateTime($fecha_origen);
      $fdestino = new DateTime($fecha_destino);

      if($forigen > $fdestino) throw new Exception('La fecha de destino no puede ser posterior a la de origen');

      if(!isset($precio)) throw new Exception('El precio no puede estar vacio');
      if(!is_numeric($precio)) throw new Exception('El precio debe ser numerico');
      if(strlen($precio)<0) throw new Exception('El precio no puede ser menor a 0');

      $this->db->query("UPDATE vuelos
                        SET nombre='$nombre',origen='$origen',fecha_origen='$fecha_origen',
                        destino='$destino',fecha_destino='$fecha_destino',precio='$precio',descripcion_vuelo='$descripcion_vuelo'
                        WHERE id_vuelos='$id_vuelos' and id_empresa='$id_empresa'");
      return;

    }

    public function getVuelosByEmpresa($id){

      if(!isset($id)) throw new Exception('El campo id no puede estar vacio');
      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');


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
        if($anio > date("Y")+5 ) throw new Exception('No se pueden buscar vuelos con fecha de origen posterior a 5 años');
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

      if(!isset($id)) throw new Exception('El campo id no puede estar vacio');
      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');

      $this->db->query("DELETE FROM vuelos WHERE id_empresa='$id'");
      return;
    }

    public function eliminarVuelo($id){

      if(!isset($id)) throw new Exception('El campo id no puede estar vacio');
      if(!ctype_digit($id)) throw new Exception('El campo id debe ser numerico');
      if(strlen($id)<1) throw new Exception('El campo id es muy corto');
      if(strlen($id)>11) throw new Exception('El campo id es muy largo');

      $this->db->query("DELETE FROM vuelos WHERE id_vuelos='$id'");
      return;
    }

  }

 ?>
