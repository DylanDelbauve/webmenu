

<div class="container col-3">
    <h1>Mot de passe oublié</h1>
    <?= $this->Form->create() ?>
        <div class="input-group">
            <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Adresse mail']); ?>
            <div class="input-group-append">
                <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Retour', ['action' => 'login'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
</div>