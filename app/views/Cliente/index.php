<?php
namespace App\Cliente;

require_once '../../vendor/autoload.php';
require_once '../../app/views/Layout/header.php';

use App\models\Cliente;

$clientes = new Cliente();
$clientes = $clientes->getAll();
var_dump($clientes);
?>

<div class="d-flex">
    <?php foreach ($clientes as $c) {
        echo "<div class='card' style='width: 18rem;'>";
        echo "<div card='card-header d-inline-flex'>";
        echo "<h4 class='card-title text-center'>" . $c['primeiro_nome'] . "</h4>";
        echo "<h4 class='card-title text-center'>" . $c['segundo_nome'] . "</h4>";
        echo "<p class='card-title text-center'>" . $c['endereco'] . "</p>";
        ?>
        <div class="card-body d-flex justify-content-center">
            <button type="button" class="btn btn-outline-dark text-center" data-toggle="modal"
                    data-target="#EquipamentsModal">
                Equipamentos
            </button>
        </div>
        <div class="modal fade" id="EquipamentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $equipamentos = $c['equipamentos'];
                        foreach ($equipamentos as $e) {
                            ?>
                            <div class="card">
                                <?php echo "<h5 class='card-title text-center text-white bg-dark'>" . $e['nome'] . "</h5>"; ?>
                                <div class="card-body">
                                    <?php echo "<p class='card-text text-center'>" . $e['dt_fabricacao'] . "</p>"; ?>
                                    <?php echo "<p class='card-text text-center'>" . $e['serial'] . "</p>"; ?>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</div>

<!-- Modal -->


<?php
require_once __DIR__ . '/../../app/views/Layout/footer.php';
?>
