<?php  

// models/Adelantos.php

class Productos extends Model {

	public function getProductos(){
		$this->db->query("SELECT * FROM products");
		return $this->db->fetchAll();
	}
}

?>