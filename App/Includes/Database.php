<?php

namespace App\Includes;
use PDO;
use PDOException;

class Database
{
    public $host = 'localhost';

    public $conn;

    public static function connect(){
        try{
            $db_name = 'db_manutencao';
            $username = 'root';
            $password = '';
            $host = 'localhost';
            $conn = new PDO('mysql:host=' . $host . ';dbname='. $db_name, $username, $password);
            return $conn;
        }catch (PDOException $e){
            echo 'Connection Error: '.$e->getMessage();
            return false;
        }
    }

}
