<h1>Modifier un menu</h1>
<?php
    echo $this->Form->create($menu);
    echo $this->Form->control('name');
    echo $this->Form->date('date');
    echo $this->Form->button(__('Sauvegarder le menu'));
    echo $this->Form->end();
?>