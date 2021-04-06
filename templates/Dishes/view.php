<h1><?= h($dish->name) ?> (<?= h($dish->dish_type->name) ?>)</h1>
<h2><?= h($dish->description) ?></h2>


<h3>Liste des allergènes</h3>
<ul>
    <?php if (count($dish->allergens) != 0) : ?>
        <?php foreach ($dish->allergens as $item) : ?>
            <li><?= h($item->name) ?></li>
        <?php endforeach; ?>
    <?php else : ?>
        <h4>Aucun allergène</h4>
    <?php endif; ?>
</ul>

<?= $this->Html->link('Modifier le plat', ['action' => 'edit', $dish->id], ['class' => 'button']) ?>

<?= $this->Html->link('Modifier les allergènes', ['action' => 'editallergens', $dish->id], ['class' => 'button']) ?>

<?= $this->Html->link('Retour', ['action' => 'index'], ['class' => 'button']) ?>

<?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'button']) ?>