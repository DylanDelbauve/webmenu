<h1>Plat</h1>
<?= $this->Html->link('Ajouter un plat', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Nom plat</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($dishes as $dish): ?>
    <tr>
        <td>
            <?= $this->Html->link($dish->name, ['action' => 'view', $dish->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $dish->id]) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id],['confirm' => 'Êtes-vous sûr ?']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>