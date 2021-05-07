<?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
<div class="container">


    <h1>Modifier les allergènes d'un plat (<?= h($dish->name) ?>)</h1>
    <?= $this->Form->create($dish); ?>
    <div class="form-group">


        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <?php
            foreach ($allergens as $allergen) :
                $checked = false;
                foreach ($dish->allergens as $element) {
                    if ($element->id == $allergen->id)
                        $checked = true;
                };
            ?>
                <?php echo $this->Form->control(strval($allergen->id), ['type' => 'checkbox', 'value' => $allergen->id, 'checked' => $checked, 'hiddenField' => false, 'label' => ['text' => $allergen->name, 'class' => 'btn btn-secondary', 'for' => strval($allergen->id)]]); ?>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="btn-group form-group">
        <?php
        echo $this->Form->button(__('Sauvegarder les modifications'), ['class' => 'btn btn-primary']);
        if ($back != '/dishes') {
            echo $this->Html->link('Retour', $back, ['class' => 'btn btn-primary']);
        } else {
            echo $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']);
        }
        ?>
    </div>
</div>