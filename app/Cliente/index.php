<?php

namespace Cliente;

require_once 'vendor/autoload.php';

use App\Models\Cliente;
?>
<h1>Clientes</h1>

<?php
$clientes = Cliente::getAll();
?>
