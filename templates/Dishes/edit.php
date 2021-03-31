<h1>Modifier un plat</h1>
<?php
    echo $this->Form->create($dish);
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->select('dish_type', $dishtypes, ['defaults' => $dish->dish_type]);
    echo $this->Form->button(__('Sauvegarder le plat'));
    echo $this->Form->end();
?>