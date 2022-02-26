<?php

namespace App\Includes;
use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'db_manutencao';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect(){
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
            return $this->conn;
        }catch (PDOException $e){
            echo 'Connection Error: '.$e->getMessage();
            return false;
        }
    }

}