<?php
$_GET['id'] ? $id = $_GET['id'] : $id = null;
require_once(__DIR__ . '/../class/classTypesBd.php');
$bd = new TypesBd();
$findOne = $bd->findOne($id, 'edit');
?>
<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <h2>Editar</h2>
        <pre>
            <?= print_r($findOne); ?>
        </pre>
    </div>
</div>