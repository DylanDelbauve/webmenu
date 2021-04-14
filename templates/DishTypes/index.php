<div class="container-fluid">
    <h1>Types de plat</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom du type de plat</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dishtypes as $dishtype) : ?>
                <tr>
                    <td>
                        <?= h($dishtype->name) ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Modifier', ['action' => 'edit', $dishtype->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $dishtype->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link('Ajouter un type de plat', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>