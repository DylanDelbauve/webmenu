<h1>Modifier un type de plat</h1>
<?php
    echo $this->Form->create($dishtype);
    echo $this->Form->control('name');
    echo $this->Form->button(__('Sauvegarder le type de plat'));
    echo $this->Form->end();
?>