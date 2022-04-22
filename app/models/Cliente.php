<?php

namespace app\models;

require_once '../../vendor/autoload.php';

use App\config\Database;
class Cliente
{
    private $id;
    private $firstName;
    private $lastName;
    private $genre;
    private $address;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param null $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }





    public function __construct()
    {
        $this->id = null;
        $this->firstName = null;
        $this->lastName = null;
        $this->genre = null;
        $this->address = null;
    }

    public static function getAll()
    {
        $clientes = [];
        $db = new Database();
        $conn = $db->connect();
        $sql = "SELECT * FROM clientes";
        $result = $conn->prepare($sql);
        $result->execute();
        $clientes = $result->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($clientes as $key => $cliente) {
                $clientes[$key]['equipamentos'] = Equipamento::getByCliente($cliente['id']);
        }
        return $clientes;
    }

}
