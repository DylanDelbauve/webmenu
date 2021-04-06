<h1>Types de plat</h1>
<?= $this->Html->link('Ajouter un type de plat', ['action' => 'add'], ['class' => 'button']) ?>

<table>
    <tr>
        <th>Nom type</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($dishtypes as $dishtype): ?>
    <tr>
        <td>
            <?= $dishtype->name ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $dishtype->id], ['class' => 'button']) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dishtype->id],['confirm' => 'Êtes-vous sûr ?', 'class' => 'button']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>