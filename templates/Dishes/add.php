<div class="container">
    <h1>Ajouter un plat</h1>
    <?php echo $this->Form->create($dish); ?>
    <div class="form-group">
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => ['text' => 'Nom du plat'], 'autocomplete' => 'off']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->select('dish_type_id', $dishtypes, ['empty' => 'Selectionner le type de plat', 'required' => true, 'class' => 'form-control']); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder le plat'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>