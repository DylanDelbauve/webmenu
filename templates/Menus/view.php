<div class="container">
    <h1>Menu du <?= h($menu->date) ?> <?= $this->Html->link(
                                            '<i class="bi bi-caret-left-fill"></i> Retour',
                                            ['action' => 'index'],
                                            ['class' => 'btn btn-primary', 'escape' => false]
                                        ) ?></h1>

    <div class="btn-toolbar">
        <div class="btn-group mr-2">


            <?= $this->Html->link('Modifier le menu', ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>

            <?= $this->Html->link('Modifier les plats', ['action' => 'editdishes', $menu->id], ['class' => 'btn btn-primary']) ?>

        </div>
        <div class="mr-2">
            <?= $this->Html->link(
                '<i class="bi bi-cloud-arrow-down-fill"></i> Exporter',
                ['action' => 'pdf', $menu->id],
                ['class' => 'btn btn-success', 'escape' => false]
            ) ?>
        </div>
        <div>
            <?= $this->Form->postLink(
                '<i class="bi bi-trash-fill"></i> Supprimer',
                ['action' => 'delete', $menu->id],
                ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger', 'escape' => false]
            ) ?>
        </div>
    </div>
    <br>
    <h3>Liste des plats</h3>
    <?php if (count($menu->dishes) != 0) : ?>
        <table class="table">
            <thead>
                <th scope="col">Plats</th>
                <th scope="col">Allergènes</th>
                <th scope="col">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($menu->dishes as $dish) : ?>
                    <tr>
                        <th>
                            <?= ucfirst(h($dish->name)) ?>
                            <span class="badge badge-info" style="background-color :<?= '#' . substr(md5(h($dish->dish_type->name)), 0, 6); ?>;"><?= h($dish->dish_type->name) ?></span>
                        </th>
                        <td>
                            <?php foreach ($dish->allergens as $allergen) : ?>
                                <span class="badge badge-info" style="background-color :<?= '#' . substr(md5(h($allergen->name)), 0, 6); ?>;"><?= h($allergen->name) ?></span>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?= $this->Html->link(
                                '<i class="bi bi-pen-fill"></i> allergènes',
                                ['controller' => 'Dishes ', 'action' => 'editallergens', $dish->id, $menu->id],
                                ['class' => 'btn btn-primary', 'escape' => false]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h4>Aucun plat</h4>
    <?php endif; ?>
</div>