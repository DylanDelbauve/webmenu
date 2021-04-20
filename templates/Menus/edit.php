<div class="container">
    <h1>Modifier un menu</h1>
    <?php echo $this->Form->create($menu); ?>

    <div class="form-group">
        <?php echo $this->Form->date('date', ['class' => 'form-control', 'required' => true]); ?>
    </div>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder le menu'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour', ['action' => 'view', $menu->id], ['class' => 'btn btn-primary']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>