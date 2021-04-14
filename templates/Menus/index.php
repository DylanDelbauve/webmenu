<div class="container-fluid">
    <h1>Menus</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Nom menu</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $menu) : ?>
                <tr>
                    <td>
                        <?= h($menu->date) ?>
                    </td>
                    <td>
                        <?= h($menu->name) ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Voir', ['action' => 'view', $menu->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $menu->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="btn-group">
        <?= $this->Html->link('Ajouter un menu', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link('Voir le menu du jour', ['action' => 'show'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>