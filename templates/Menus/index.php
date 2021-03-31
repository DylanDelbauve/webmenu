<h1>Menu</h1>
<?= $this->Html->link('Ajouter un menu', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Nom menu</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($menus as $menu): ?>
    <tr>
        <td>
            <?= $this->Html->link($menu->name, ['action' => 'view', $menu->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $menu->id]) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id],['confirm' => 'Êtes-vous sûr ?']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>