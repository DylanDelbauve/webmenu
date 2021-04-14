<div class="container">
    <h1>Modifier un allergène</h1>
    <?php echo $this->Form->create($allergen); ?>
    <div class="form-group">
        <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => ['text' => 'Nom du plat'], 'required' => true]); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder l\'allergène'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']);
        echo $this->Form->postLink('Supprimer', ['action' => 'delete', $allergen->id], ['confirm' => 'Êtes-vous sûr ?', 'class' => 'btn btn-danger']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>