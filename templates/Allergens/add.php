<h1>Ajouter un allergène</h1>
<?php
    echo $this->Form->create($allergen);
    echo $this->Form->control('name');
    echo $this->Form->button(__('Sauvegarder l\'allergène'));
    echo $this->Form->end();
?>