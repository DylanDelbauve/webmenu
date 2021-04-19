<div class="container">
    <h1>Menu du <?= h($menu->date) ?></h1>


    <h3>Liste des plats</h3>
    <?php if (count($menu->dishes) != 0) : ?>
        <ul class="list-group-flush">
            <?php foreach ($menu->dishes as $item) : ?>
                <li class="list-group-item"><?= h($item->name) ?> <span class="badge badge-info"><?= h($item->dish_type->name) ?></span></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <h4>Aucun plat</h4>
    <?php endif; ?>

    <div class="btn-group">
        <?= $this->Html->link('Modifier le menu', ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Modifier les plats', ['action' => 'editdishes', $menu->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>

        <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
    </div>
</div>