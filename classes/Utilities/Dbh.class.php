<?php

namespace Classes\Utilites; 
 

class Dbh{ 
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "barangay";

    protected function connect(){
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    } 
}




?>