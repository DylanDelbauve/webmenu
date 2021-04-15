<div class="container">
    <h1>Mot de passe oublié</h1>
    <?= $this->Form->create(null, ['url' => '/users/reset_password_token/'.$user->reset_password_token, 'type' => 'post']) ?>
    <?php echo $this->Form->control('new_password', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Nouveau mot de passe']); ?>
    <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>