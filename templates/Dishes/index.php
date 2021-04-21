<div class="container-fluid">
    <h1>Plats</h1>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <?= $this->Html->link('Ajouter un plat', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group">
            <?= $this->Paginator->sort('name', "Tri par nom") ?>
            <?= $this->Paginator->sort('DishTypes.name', "Tri par type de plat") ?>
        </div>
    </div>
    <br>
    <table class="table table-striped overflow-auto">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom du plat</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dishes as $dish) : ?>
                <tr>
                    <td>
                        <?= ucfirst(h($dish->name)) ?> <span class="badge badge-info" style="background-color :<?= '#'.substr(md5(h($dish->dish_type->name)), 0, 6); ?>;"><?= h($dish->dish_type->name) ?></span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Voir', ['action' => 'view', $dish->id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('Modifier les allergènes', ['action' => 'editallergens', $dish->id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->prev() ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next() ?>
        </ul>
    </nav>
</div>