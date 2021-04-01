<h1>Modifier les plats d'un menu (<?= h($menu->name) ?>)</h1>

<?php
    echo $this->Form->create($menu);
    echo '<fieldset>';
    foreach ($dishes as $dish) {
        $checked = false;
        foreach ($menu->dishes as $element) {
            if ($element->id == $dish->id)
                $checked = true;
        };
        echo '<div>';
        echo $this->Form->checkbox(strval($dish->id), array('value' => $dish->id, 'checked' => $checked, 'hiddenField' => false));
        echo $this->Form->label(strval($dish->id),$dish->name);
        echo '</div>';
    };
    echo '</fieldset>';
    echo $this->Form->button(__('Sauvegarder les modifications'));
    echo $this->Form->end();
?>