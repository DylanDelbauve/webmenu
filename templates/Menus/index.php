<h1>Menus</h1>
<?= $this->Html->link('Ajouter un menu', ['action' => 'add'], ['class' => 'button']) ?>

<?= $this->Html->link('Voir le menu du jour', '/menus/show', ['class' => 'button']) ?>
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
            <?= h($menu->name) ?>
        </td>
        <td>
            <?= $this->Html->link('Voir', ['action' => 'view', $menu->id], ['class' => 'button']) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id],['confirm' => 'Êtes-vous sûr ?', 'class' => 'button']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>