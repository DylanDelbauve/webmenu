<div class="container">
    <h1>Modifier le mot de passe</h1>
    <?php echo $this->Form->create($user); ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => ['text' => 'Nom'], 'readonly']); ?>
        </div>
    
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('email', ['class' => 'form-control', 'readonly', 'label' => ['text' => 'Adresse mail']]); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $this->Form->control('password', ['class' => 'form-control', 'required' => false, 'label' => ['text' => 'Mot de passe'], 'value' => '']); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder l\'utilisateur'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'view', $user->id], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>