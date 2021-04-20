<div class="container">
    <h1>Modifier les allergènes d'un plat (<?= h($dish->name) ?>)</h1>
    <?php
    echo $this->Form->create($dish);
    foreach ($allergens as $allergen) {
        $checked = false;
        foreach ($dish->allergens as $element) {
            if ($element->id == $allergen->id)
                $checked = true;
        };
    ?>
        <div class="form-check">
            <?php echo $this->Form->control(strval($allergen->id), ['type' => 'checkbox', 'value' => $allergen->id, 'checked' => $checked, 'hiddenField' => false, 'class' => 'form-check-input', 'label' => ['text' => $allergen->name, 'class' => 'form-check-label', 'for' => strval($allergen->id)]]); ?>

        </div>
    <?php }; ?>
    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder les modifications'), ['class' => 'btn btn-primary']);
        echo $this->Html->link('Retour',$this->request->referer(), ['class' => 'btn btn-primary']);
        ?>
    </div>
</div>