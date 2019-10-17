<?php
require_once(__DIR__ . '/../class/classTypesBd.php');
$bd = new TypesBd();
$findAll = $bd->findAll();
?>
<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <h2>Gerenciar</h2>
        <div class="list-group">
            <?php foreach ($findAll as $post_type) { ?>
                <a href="?page=edit&id=<?= $post_type['id']; ?>" class="list-group-item list-group-item-action">
                    <?= $post_type['name']; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</div>