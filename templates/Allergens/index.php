<div class="container-fluid">
    <h1>Allergènes</h1>
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
                        <?= h($allergen->name) ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Modifier', ['action' => 'edit', $allergen->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $allergen->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link('Ajouter un allergène', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
</div>