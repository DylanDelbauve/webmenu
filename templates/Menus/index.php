<div class="container-fluid">
    <h1>Menus</h1>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <?= $this->Html->link('<i class="bi bi-plus-lg"></i>', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
        <div class="mr-2">
            <?= $this->Html->link('Voir le menu du jour', ['action' => 'show'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group">
            <?= $this->Paginator->sort('date', 'Tri par date') ?>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $menu) : ?>
                <tr>
                    <td>
                        <?= h($menu->date) ?>
                        <?php if ($this->Time->isToday($menu->date)) : ?>
                            <span class="badge badge-info">Aujourd'hui</span>
                        <?php elseif ($this->Time->isTomorrow($menu->date)) : ?>
                            <span class="badge badge-dark">Demain</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('<i class="bi bi-eye-fill"></i>', ['action' => 'view', $menu->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(
                                '<i class="bi bi-cloud-arrow-down-fill"></i>',
                                ['action' => 'pdf', $menu->id],
                                ['class' => 'btn btn-success', 'escape' => false]
                            ) ?>
                            <?= $this->Form->postLink(
                                '<i class="bi bi-trash-fill"></i>',
                                ['action' => 'delete', $menu->id],
                                ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger', 'escape' => false]
                            ) ?>
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