<?php

namespace App\Models;
use App\Includes\Database;



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
       $db = new Database();
       $db = $db->connect();
       $sql = "SELECT * FROM cidade WHERE id = :id";
       $stmt = $db->prepare($sql);
       $stmt->bindParam(':id', $id);
       $stmt->execute();
       $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
       return $result;
    }


}