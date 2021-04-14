<div class="container">
    <h1>Ajouter un plat</h1>
    <?php echo $this->Form->create($dish); ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => ['text' => 'Nom du plat']]); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('description', ['class' => 'form-control']); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $this->Form->select('dish_type_id', $dishtypes, ['empty' => 'Selectionner le type de plat', 'required' => true, 'class' => 'form-control']); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder le plat'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'view', $dish->id], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>