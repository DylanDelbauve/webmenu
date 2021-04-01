<h1>Plat</h1>

<?php 

?>
<?= $this->Html->link('Ajouter un plat', ['action' => 'add'], ['class' => 'button']) ?>

<table>
    <tr>
        <th>Nom plat</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($dishes as $dish): ?>
    <tr>
        <td>
            <?= $this->Html->link($dish->name, ['action' => 'view', $dish->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $dish->id], ['class' => 'button']) ?>        
        </td>
        <td>
            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id],['confirm' => 'Êtes-vous sûr ?', 'class' => 'button']) ?>        
        </td>
    </tr>
    <?php endforeach; ?>

</table>