<div class="container-fluid">
    <h1>Allergènes</h1>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <?= $this->Html->link('<i class="bi bi-plus-lg"></i>', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
        <div class="btn-group">
            <?= $this->Paginator->sort('name', 'Tri par nom') ?>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom de l'allergène</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allergens as $allergen) : ?>
                <tr>
                    <td>
                        <?= ucfirst(h($allergen->name)) ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('<i class="bi bi-pen-fill"></i>', ['action' => 'edit', $allergen->id], ['class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="bi bi-trash-fill"></i>', ['action' => 'delete', $allergen->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger', 'escape' => false]) ?>
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