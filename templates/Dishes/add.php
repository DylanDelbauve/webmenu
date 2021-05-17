<div class="container">
    <h1>Ajouter un plat</h1>
    <?php echo $this->Form->create($dish); ?>

    <div class="form-row">
        <div class="form-group col-md-6">
                <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'autocomplete' => 'off', 'placeholder' => 'Nom du plat', 'onchange' => 'onInput()']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->select('dish_type_id', $dishtypes, ['empty' => 'Selectionner le type de plat', 'required' => true, 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="form-group">
        <ul class="list-group"></ul>
    </div>
    <div class="btn-group form-row">
        <?php
        echo $this->Form->button(__('Sauvegarder le plat'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>