<?php

namespace App\config;


class Database
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'db_manutencao';
    const DB_USER = 'root';
    const DB_PASS = '';



    public static function connect(){
        try {
            $connection = new \PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            die('Falha na conexão' . $e->getMessage());
        }
    }

}
