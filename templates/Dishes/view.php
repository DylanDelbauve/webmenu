<div class="container">
    <h1><?= h($dish->name) ?> <span class="badge badge-info" style="background-color :<?= '#'.substr(md5(h($dish->dish_type->name)), 0, 6); ?>;"><?= h($dish->dish_type->name) ?></span></h1>
    <h2><?= h($dish->description) ?></h2>


    <h3>Liste des allergènes</h3>
    <?php if (count($dish->allergens) != 0) : ?>
        <ul class="list-group-flush">
            <?php foreach ($dish->allergens as $item) : ?>
                <li class="list-group-item"><?= h($item->name) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <h4>Aucun allergène</h4>
    <?php endif; ?>

    <div class="btn-group">
        <?= $this->Html->link('Modifier le plat', ['action' => 'edit', $dish->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Modifier les allergènes', ['action' => 'editallergens', $dish->id], ['class' => 'btn btn-primary']) ?>

        <?= $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>

        <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
    </div>
</div>