<?php
require_once './vendor/autoload.php';
require_once 'App/Views/Layouts/header.php';


$e = new \App\Models\Equipamento();
$t = new \App\Models\Tipo();
$e = $e->getById(1);
echo '<pre>';
var_dump($e);




echo '</pre>';

?>




<?php
require_once 'App/Views/Layouts/footer.php';
?>
