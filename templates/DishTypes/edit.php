<h1>Modifier un type de pplat</h1>
<?php
    echo $this->Form->create($dishtype);
    echo $this->Form->control('type');
    echo $this->Form->button(__('Sauvegarder le type de plat'));
    echo $this->Form->end();
?>