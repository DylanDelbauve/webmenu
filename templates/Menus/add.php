<h1>Ajouter un menu</h1>
<?php
    echo $this->Form->create($menu);
    echo $this->Form->control('name');
    echo $this->Form->date('date', ['required' => true]);
    echo $this->Form->button(__('Sauvegarder le menu'))." ";
    echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'button']);
    echo $this->Form->end();
?>