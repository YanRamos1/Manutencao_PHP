<?php
require_once './vendor/autoload.php';
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Cliente;

    $bairro = new Bairro();
    $cidade = new Cidade();
    $bairro = $bairro->getById(1);

    echo '<pre>';
    var_dump($bairro->cidade());
    echo '</pre>';



?>
