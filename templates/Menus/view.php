<h1><?= h($menu->name) ?></h1>
<?= $this->Html->link('Modifier', ['action' => 'edit',$menu->id], ['class' => 'button']) ?>
<?= $this->Html->link('Ajouter des plats', ['action' => 'editdishes',$menu->id], ['class' => 'button']) ?>

<ul>
    <?php if (count($menu->dishes) != 0) : ?>
        <?php foreach ($menu->dishes as $item) : ?>
            <li><?= h($item->name) ?></li>
        <?php endforeach; ?>
    <?php else : ?>
        <h4>Aucun plat</h4>
    <?php endif; ?>
</ul>