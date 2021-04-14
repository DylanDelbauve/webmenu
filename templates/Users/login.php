<div class="container">
    <h1>Connexion</h1>
    <?= $this->Form->create() ?>
    <div class="form-group">
        <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Adresse mail']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Mot de passe']) ?>
    </div>
    <div class="form-row">
        <?= $this->Form->submit(__('Connexion'), ['class' => 'btn btn-primary col-mb-6']); ?>

        <?= $this->Html->link('Mot de passe oublié', ['action' => 'forgotPassword'], ['class' => 'btn btn-link col-mb-6']); ?>
    </div>
</div>