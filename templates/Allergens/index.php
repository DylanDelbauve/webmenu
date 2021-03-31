<h1>Allergenes</h1>
<?= $this->Html->link('Ajouter un allergène', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Nom allergene</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($allergens as $allergen): ?>
    <tr>
        <td>
            <?= $this->Html->link($allergen->name, ['action' => 'view', $allergen->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $allergen->id]) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $allergen->id],['confirm' => 'Êtes-vous sûr ?']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>