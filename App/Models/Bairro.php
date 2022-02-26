<?php

namespace App\Models;
use App\Models\Cidade;
use App\Includes\Database;
use PDO;

class Bairro extends Cidade
{
    private $id;
    private $nome;
    private $cidade;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }

    /**
     * @return mixed
     */
    public function getCidade(){
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getById($id){
        $sql = "SELECT * FROM bairro WHERE id = :id";
        $db= new Database();
        $db = $db->connect();
        $stmt =$db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    public function all(){
        //use PDO to get all rows
        $sql = "SELECT * FROM bairro";
        $db= new Database();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($nome, $cidade){
        $sql = "INSERT INTO bairro (nome, cidade_id) VALUES (:nome, :cidade_id)";
        $db= new Database();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cidade_id', $this->cidade);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    public function cidade(){
    }









}