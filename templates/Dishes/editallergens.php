<h1>Modifier les allergènes d'un plat (<?= h($dish->name) ?>)</h1>

<?php
    echo $this->Form->create($dish);
    echo '<fieldset>';
    foreach ($allergens as $allergen) {
        $checked = false;
        foreach ($dish->allergens as $element) {
            if ($element->id == $allergen->id)
                $checked = true;
        };
        echo '<div>';
        echo $this->Form->checkbox(strval($allergen->id), array('value' => $allergen->id, 'checked' => $checked, 'hiddenField' => false));
        echo $this->Form->label(strval($allergen->id),$allergen->name);
        echo '</div>';
    };
    echo '</fieldset>';
    echo $this->Form->button(__('Sauvegarder les modifications'));
    echo $this->Form->end();
?>
