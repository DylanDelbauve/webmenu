<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <h1>Ajouter un utilisateur</h1>
    <?php echo $this->Form->create($user); ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => ['text' => 'Nom'], 'autocomplete' => 'off']); ?>
        </div>
    
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => ['text' => 'Adresse mail'], 'autocomplete' => 'off']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $this->Form->control('password', ['class' => 'form-control', 'required' => true, 'label' => ['text' => 'Mot de passe']]); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder l\'utilisateur'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
