<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="container-fluid">
    <h1>Menus</h1>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <?= $this->Html->link('Ajouter un utilisateur', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group">
            <?= $this->Paginator->sort('id', 'Tri par ID') ?>
            <?= $this->Paginator->sort('name', 'Tri par nom') ?>
            <?= $this->Paginator->sort('email', 'Tri par email') ?>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <?= $this->Number->format($user->id) ?>
                    </td>
                    <td>
                        <?= h($user->name) ?>
                    </td>
                    <td>
                        <?= h($user->email) ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link('Voir', ['action' => 'view', $user->id], ['class' => 'btn btn-success']) ?>
                            <?php if ($auth->id == 1 && $user->id != 1) : ?>
                                <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $user->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']) ?>
                            <?php endif; ?>
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