<?php if ($menu == null) : ?>
    <h1>Aucun menu</h1>
<?php else : ?>
    <h1>Menu du <?= h($menu->date) ?></h1>
<?php endif; ?>
<h2>Entrée</h2>
<?php foreach ($menu->dishes as $dish) : ?>
    <?php if ($dish->dish_type->name === 'Entrée') : ?>
        <h3><?= $dish->name ?></h3>
        <small><i>
        <?php foreach($dish->allergens as $allergen): ?>
            <?= $allergen->name ?>
        <?php endforeach; ?>
        </i></small>
    <?php endif; ?>
<?php endforeach; ?>
<br>
<h2>Plat</h2>
<?php foreach ($menu->dishes as $dish) : ?>
    <?php if ($dish->dish_type->name === 'Plat') : ?>
        <h3><?= $dish->name ?></h3>
        <small><i>
        <?php foreach($dish->allergens as $allergen): ?>
            <?= $allergen->name ?>
        <?php endforeach; ?>
        </i></small>
    <?php endif; ?>
<?php endforeach; ?>
<br>
<h2>Dessert</h2>
<?php foreach ($menu->dishes as $dish) : ?>
    <?php if ($dish->dish_type->name === 'Dessert') : ?>
        <h3><?= $dish->name ?></h3>
        <small><i>
        <?php foreach($dish->allergens as $allergen): ?>
            <?= $allergen->name ?>
        <?php endforeach; ?>
        </i></small>
    <?php endif; ?>
<?php endforeach; ?>
