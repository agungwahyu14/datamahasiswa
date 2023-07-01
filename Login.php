<?php
require_once 'config/Database.php';

class Login extends Database
{
  // MENGAMBIL DATA PETUGAS SESUAI USERNAME DAN PASSWORD
  public function getPetugas($username, $password)
  {
    $username = mysqli_real_escape_string($this->conn, $username);
    $password = mysqli_real_escape_string($this->conn, $password);

    $query = "SELECT * FROM tb_admin WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = $this->query($query);

    return $result;
  }

}