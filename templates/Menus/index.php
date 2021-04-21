<div class="container-fluid">
    <h1>Menus</h1>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <?= $this->Html->link('Ajouter un menu', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
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
                        <?php if($this->Time->isToday($menu->date)) : ?>
                            <span class="badge badge-info">Aujourd'hui</span>
                        <?php elseif ($this->Time->isTomorrow($menu->date)): ?>
                            <span class="badge badge-dark">Demain</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Voir', ['action' => 'view', $menu->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Html->link('Générer PDF', ['action' => 'pdf', $menu->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
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