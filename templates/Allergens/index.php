<h1>Allergènes</h1>
<?= $this->Html->link('Ajouter un allergène', ['action' => 'add'], ['class' => 'button']) ?>

<table>
    <tr>
        <th>Nom allergene</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($allergens as $allergen) : ?>
        <tr>
            <td>
                <?= h($allergen->name) ?>
            </td>
            <td>
                <?= $this->Html->link('Modifier', ['action' => 'edit', $allergen->id], ['class' => 'button']) ?>
            </td>
            <td>
                <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $allergen->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'button']) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>