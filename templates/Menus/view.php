<div class="container">
    <h1>Menu du <?= h($menu->date) ?></h1>


    <h3>Liste des plats</h3>
    <?php if (count($menu->dishes) != 0) : ?>
        <ul class="list-group-flush">
            <?php foreach ($menu->dishes as $dish) : ?>
                <li class="list-group-item"><?= ucfirst(h($dish->name)) ?> 
                    <span class="badge badge-info" style="background-color :<?= '#'.substr(md5(h($dish->dish_type->name)), 0, 6); ?>;"><?= h($dish->dish_type->name) ?></span>
                    <?php foreach ($dish->allergens as $allergen) : ?>
                        <span class="badge badge-info" style="background-color :<?= '#'.substr(md5(h($allergen->name)), 0, 6); ?>;"><?= h($allergen->name) ?></span>
                    <?php endforeach; ?>
                    <?= $this->Html->link('Modifier allergènes', ['controller' => 'Dishes ','action' => 'editallergens', $dish->id], ['class' => 'badge badge-success']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <h4>Aucun plat</h4>
    <?php endif; ?>

    <div class="btn-group">
        <?= $this->Html->link('Modifier le menu', ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Modifier les plats', ['action' => 'editdishes', $menu->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('PDF', ['action' => 'pdf', $menu->id], ['class' => 'btn btn-success']) ?>

        <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
    </div>
</div>