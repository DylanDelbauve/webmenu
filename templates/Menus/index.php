<h1>Menu</h1>
<?= $this->Html->link('Ajouter un menu', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Date</th>
        <th>Nom menu</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($menus as $menu): ?>
    <tr>
        <td>
            <?= h($menu->date) ?>
        </td>
        <td>
            <?= $this->Html->link($menu->name, ['action' => 'view', $menu->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Voir', ['action' => 'view', $menu->id]) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id],['confirm' => 'Êtes-vous sûr ?']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>