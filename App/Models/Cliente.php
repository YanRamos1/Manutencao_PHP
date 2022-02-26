<?php

namespace App\Models;

use App\Includes\Database;
use PDO;
use PDOException;
use App\Models\Cidade;
class Cliente
{
    public $id;
    public $primeiroNome;
    public $segundoNome;
    public $genero;
    public $bairro;

    public function getById($id){
        try {
            $sql = "SELECT * FROM cliente WHERE id = :id";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $result = $p_sql->fetchObject();
            $result->bairro = $this->getBairrofromID($result->id_bairro);
            $result->bairro->cidade = new Cidade();
            $result->bairro->cidade = $result->bairro->cidade->getById($result->bairro->cidade_id);
            return $result;
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }
    public function getBairrofromID($id){
        try {
            $sql = "SELECT * FROM bairro WHERE id = :id";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $p_sql->fetchObject();
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }
    public function all(){
        try {
            $sql = "SELECT * FROM cliente";
            $p_sql = Database::connect()->prepare($sql);
            $p_sql->execute();
            $p_sql = $p_sql->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($p_sql as $key => $value) {
                $p_sql[$key]['bairro'] = $this->getBairrofromID($value['id_bairro']);
                $p_sql[$key]['bairro']['cidade'] = new Cidade();
                $p_sql[$key]['bairro']['cidade'] = $p_sql[$key]['bairro']['cidade']->getById($p_sql[$key]['bairro']['cidade_id']);
            }
            var_dump($p_sql);
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br/>";
        }
    }
}
