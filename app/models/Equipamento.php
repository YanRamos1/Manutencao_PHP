<?php

namespace App\Models;

use App\config\Database;

class Equipamento
{
    private $id;
    private $name;
    private $fabrication_date;
    private $serial;
    private $id_cliente;
    private $id_tipo;

    public function __construct()
    {
        $this->id = null;
        $this->name = null;
        $this->fabrication_date =null;
        $this->serial = null;
        $this->id_cliente = Cliente::class;
        $this->id_tipo = null;
    }

    public static function getByCliente($id)
    {
        $sql = "SELECT * FROM equipamentos WHERE id_cliente = :id";
        $stmt = Database::connect();
        $stmt = $stmt->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
