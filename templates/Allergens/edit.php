<!-- Fichier : src/Template/Articles/edit.ctp -->

<h1>Modifier un allergène</h1>
<?php
    echo $this->Form->create($allergen);
    echo $this->Form->control('name');
    echo $this->Form->button(__('Sauvegarder l\'article'));
    echo $this->Form->end();
?>