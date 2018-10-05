<?php

class DB{


  private $host     = "localhost";
  private $user     = "root";
  private $password = "";
  private $database ="medee";
  

  public function connect(){
    $this->host = "localhost";
    $this->user = "root";
    $this->password = "";
    $this->database = "medee";
    $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
    mysqli_set_charset($conn,"utf8");

    if(mysqli_connect_errno()) {
      echo "Error: Could not connect to database.";
            exit;
    }

    return $conn;
  }
}

 ?>
