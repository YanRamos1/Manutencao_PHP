<?php

namespace App\Models;

use App\Includes\Database;
use PDO;
use PDOException;

class Cliente
{
    // Atributos
    private $id;
    private $primeiroNome;
    private $segundoNome;
    private $genero;
    private $bairro;
    private $telefone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }

    /**
     * @param mixed $primeiroNome
     */
    public function setPrimeiroNome($primeiroNome)
    {
        $this->primeiroNome = $primeiroNome;
    }

    /**
     * @return mixed
     */
    public function getSegundoNome()
    {
        return $this->segundoNome;
    }

    /**
     * @param mixed $segundoNome
     */
    public function setSegundoNome($segundoNome)
    {
        $this->segundoNome = $segundoNome;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->Bairro();
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }




    public function all(){
        try{
            $sql = "SELECT * FROM cliente";
            $db = new Database();
            $db = $db->connect();
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            return null;
        }
    }
    //update
    public function update(){
        try{
            $sql = "UPDATE cliente SET primeiro_nome = '$this->primeiroNome', ultimo_nome = '$this->ultimoNome', email = '$this->email', telefone = '$this->telefone', genero = '$this->genero' WHERE id = '$this->id'";
            $db = new Database();
            $db = $db->connect();
            $stmt = $db->query($sql);
            return $stmt;
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            return null;
        }
    }
    //create cliente
    public function create(){
        try{
            $sql = "INSERT INTO cliente (primeiro_nome, segundo_nome,genero,telefone VALUES ('$this->primeiroNome', '$this->ultimoNome', '$this->email', '$this->telefone', '$this->genero')";
            $db = new Database();
            $db = $db->connect();
            $stmt = $db->query($sql);
            return $stmt;
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            return null;
        }
    }

    //relation bairro
    public function Bairro(){
        try{
            $sql = "SELECT * FROM bairro WHERE id = '$this->bairro'";
            $db = new Database();
            $db = $db->connect();
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            return null;
        }
    }
}
