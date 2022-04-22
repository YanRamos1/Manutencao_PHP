<?php

namespace app\models;

class Material
{

    private $id;
    private $nome;
    private $descricao;
    private $valor;

    public function __construct($id = null, $nome = null, $descricao = null, $valor = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
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

    /**
     * @return mixed|null
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed|null $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed|null
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed|null $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }




}
