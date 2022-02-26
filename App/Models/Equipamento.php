<?php

namespace App\Models;
use App\Includes\Database;
use App\Models\Cliente;
class Equipamento
{
    private $id;
    private $nome;
    private $dt_fabricacao;
    private $serial;
    private $cliente;
    private $tipo;

    /**
     * @param $id
     * @param $nome
     * @param $dt_fabricacao
     * @param $serial
     * @param \App\Models\Cliente $cliente
     * @param \App\Models\Tipo $tipo
     */
    public function __construct($id = null, $nome = null, $dt_fabricacao = null, $serial = null, Cliente $cliente = null,Tipo $tipo = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->dt_fabricacao = $dt_fabricacao;
        $this->serial = $serial;
        $this->cliente = Cliente::class;
        $this->tipo = Tipo::class;
    }


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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDtFabricacao()
    {
        return $this->dt_fabricacao;
    }

    /**
     * @param mixed $dt_fabricacao
     */
    public function setDtFabricacao($dt_fabricacao)
    {
        $this->dt_fabricacao = $dt_fabricacao;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    //CRUD
    public function getById($id)
    {
        try {
            $db = Database::connect();
            $sql = "SELECT * FROM equipamento WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetchObject();
            $result->cliente = new Cliente();
            $result->cliente = $result->cliente->getById($result->id_cliente);
            $result->tipo = new Tipo();
            $result->tipo = $result->tipo->getById($result->id_tipo);
            return $result;

        }catch (\Exception $e){
            echo $e->getMessage();
        }



    }



}

