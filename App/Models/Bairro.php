<?php

namespace App\Models;
use App\Models\Cidade;
use App\Includes\Database;
use PDO;
use PDOException;

class Bairro extends Cidade
{
    private $id;
    private $nome;
    private $cidade_id;
    private $cidade;

    public function getById($id){
        try{
            $sql = "SELECT * FROM bairro WHERE id = :id";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_OBJ);
            $result->cidade = $this->getCidadeById($result->cidade_id);
            return $result;
        }catch(PDOException $e){
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }
    private function getCidadeById($cidade_id)
    {
        try {
            $sql = "SELECT * FROM cidade WHERE id = :id";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->bindValue(":id", $cidade_id);
            $p_sql->execute();
            return $p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }
    public function all(){
        try{
            $sql = "SELECT * FROM bairro";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            foreach($result as $bairro){
                $bairro->cidade = $this->getCidadeById($bairro->cidade_id);
            }
            return $result;
        }catch(PDOException $e){
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }

}
