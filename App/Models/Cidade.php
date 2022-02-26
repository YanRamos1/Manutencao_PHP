<?php

namespace App\Models;
use App\Includes\Database;
use PDO;
use PDOException;


class Cidade
{
    private $id;
    private $nome;

    //getters and setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getById($id){
       try{
           $sql = "SELECT * FROM cidade WHERE id = :id";
           $p_sql = Database::connect()->prepare($sql);
           $p_sql->bindValue(":id", $id);
           $p_sql->execute();
           $p_sql->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Cidade');
           $p_sql =  $p_sql->fetchObject();
           return $p_sql;
       }catch (PDOException $e){
           echo "Erro ao buscar cidade: ".$e->getMessage();
       }
    }


}
