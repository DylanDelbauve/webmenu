<h1>Ajouter un plat</h1>
<?php
echo $this->Form->create($dish);
echo $this->Form->control('name', ['required' => true]);
echo $this->Form->control('description');
echo $this->Form->select('dish_type_id', $dishtypes, ['empty' => 'Selectionner le type de plat', 'required' => true]);
echo $this->Form->button(__('Sauvegarder le plat')) . " ";
echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'button']);
echo $this->Form->end();
?>