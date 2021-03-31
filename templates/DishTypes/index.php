<h1>Type de plat</h1>
<?= $this->Html->link('Ajouter un type de plat', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Nom type</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($dishtypes as $dishtype): ?>
    <tr>
        <td>
            <?= $this->Html->link($dishtype->type, ['action' => 'view', $dishtype->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $dishtype->id]) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dishtype->id],['confirm' => 'Êtes-vous sûr ?']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>