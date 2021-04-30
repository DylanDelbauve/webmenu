<div class="container">
    <h1>Modifier les plats d'un menu (<?= h($menu->name) ?>)</h1>
    <?= $this->Form->create(null, ['onsubmit' => 'event.preventDefault()']) ?>
    <?= $this->Form->hidden('id', ['id' => 'idMenu', 'value' => $menu->id]) ?>
    <div class="input-group">
        <div class="input-group-prepend">
            <?= $this->Form->select('dish_type_filter', $dishtypes, ['onchange' => 'onChange()', 'id' => 'select_type', 'empty' => 'Type de plat', 'class' => 'form-control selectpicker    ']) ?>
        </div>
        <?= $this->Form->select('dishes', $dishes, ['id' => 'dishes', 'class' => 'form-control selectpicker', 'data-live-search' => true ]) ?>
        <div class="input-group-append">
            <button class="btn btn-primary" onclick="addDish()">Ajouter</button>
            <?= $this->Html->link('Retour', ['action' => 'get', $menu->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>

    <br>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Plat</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu->dishes as $dish) : ?>
                <tr id="<?= h($dish->id) ?>">
                    <td>
                        <?= h($dish->name) ?> <span class="badge badge-info"><?= h($dish->dish_type->name) ?></span>
                    </td>
                    <td>
                        <button class="btn btn-danger" id="<?= h($dish->id) ?>" onclick="delDish(this.id)">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>