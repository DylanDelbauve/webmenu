<h1>Modifier les plats d'un menu (<?= h($menu->name) ?>)</h1>

<?php
echo $this->Form->create(null, ['onsubmit' => 'event.preventDefault()']);
echo $this->Form->hidden('id', ['id' => 'idMenu', 'value' => $menu->id ]);
echo $this->Form->select('dish_type_filter', $dishtypes, ['onchange' => 'onChange()', 'id' => 'select_type', 'empty' => 'Type de plat']);
echo $this->Form->select('dishes', $dishes, ['id' => 'dishes']);
echo '<button onclick="addDish()">Ajouter</button>';
echo $this->Form->end();
?>

<table>
    <tr>
        <th>Plats</th>
        <th></th>
    </tr>

    <?php foreach ($menu->dishes as $dish) : ?>
        <tr id="<?= h($dish->id) ?>">
            <td><?= h($dish->name) ?> <small><i>(<?= h($dish->dish_type->name) ?>)</i></small></td>
            <td><button id="<?= h($dish->id) ?>" onclick="delDish(this.id)">Supprimer</button></td>
        </tr>
    <?php endforeach; ?>

</table>