<h1>Modifier un type de plat</h1>
<?php
    echo $this->Form->create($dishtype);
    echo $this->Form->control('name', ['required' => true]);
    echo $this->Form->button(__('Sauvegarder le type de plat'))." ";
    echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'button']);
    echo $this->Form->end();
?>