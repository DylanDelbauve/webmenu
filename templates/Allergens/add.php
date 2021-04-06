<h1>Ajouter un allergène</h1>
<?php
    echo $this->Form->create($allergen);
    echo $this->Form->control('name', ['required' => true]);
    echo $this->Form->button(__('Sauvegarder l\'allergène'))." ";
    echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'button']);
    echo $this->Form->end();
?>