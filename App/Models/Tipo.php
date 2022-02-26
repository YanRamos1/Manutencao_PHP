<?php

namespace App\Models;
use App\Includes\Database;
use App\Models\Equipamento;
class Tipo
{
    private $id;
    private $nome;

    public function __construct($id = null, $nome = null)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed|null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getByID($id)
    {
        $sql = "SELECT * FROM tipo_equipamento WHERE id = :id";
        $stmt = Database::connect()->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->FetchObject();
    }


}
