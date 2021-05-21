<div class="container">
    <h1>Modifier les plats du menu du <?= h($menu->date) ?></h1>
    <?= $this->Form->create(null, ['onsubmit' => 'event.preventDefault()']) ?>
    <?= $this->Form->hidden('id', ['id' => 'idMenu', 'value' => $menu->id]) ?>
    <div class="input-group row">
        <div class="input-group-prepend col-md">
            <?= $this->Form->select('dish_type_filter', $dishtypes, ['onchange' => 'onChange()', 'id' => 'select_type', 'empty' => 'Type de plat', 'class' => 'form-control selectpicker']) ?>
        </div>
        <div class="col-md">
            <?= $this->Form->select('dishes', $dishes, ['id' => 'dishes', 'class' => 'form-control selectpicker', 'data-live-search' => true ]) ?>

        </div>
        <div class="col-md">
            <?= $this->Form->number('priority', ['id' => 'priority', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Priorité d\'affichage', 'min' => 1, 'max' => 10]) ?>

        </div>
        <div class="input-group-append col-md">
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
                <th scope="col">Priorité</th>
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
                        <?= h($dish->_joinData->priority) ?>
                    </td>
                    <td>
                        <button class="btn btn-danger" id="<?= h($dish->id) ?>" onclick="delDish(this.id)">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>