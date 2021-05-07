<div class="container col-md-3">
    <h1>Connexion</h1>
    <?= $this->Form->create() ?>
    <div class="form-group">
        <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Adresse mail']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Mot de passe']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->submit(__('Connexion'), ['class' => 'btn btn-primary col-md-6']); ?>
    </div>
        <?= $this->Html->link('Voir le menu du jour', ['controller' => 'Menus', 'action' => 'show'], ['class' => 'btn btn-primary col-md-6']) ?>
</div>