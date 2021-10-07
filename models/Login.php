<?php

class Login extends Model {
  public function getLogin(){
    $this->db->query("SELECT * FROM login");
    return $this->db->fetchAll();
  }

}


?>
