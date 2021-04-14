<div class="container-fluid">
    <h1>Plats</h1>
    <table class="table table-striped">
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
                        <?= $this->Html->link($dish->name, ['action' => 'view', $dish->id]) ?>
                    </td>
                    <td>
                        <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dish->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link('Ajouter un plat', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>