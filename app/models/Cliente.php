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
