<div class="company">
    <img src="/img/logo.svg" height="64px" width="64px" alt="">
    <h1><?= h($info->company_name) ?></h1>
</div>
<div id="main" class="container-fluid">
    <div class="row">
            
            <div class="text color">
                <h1 id="date"></h1>
            </div>
    </div>
    <div class="row">
        <div id="menu" class="container-fluid">
            <?php if ($menu != null) : ?>
                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="color">Entrées</h2>
                        </div>
                        <div class="card-body">

                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Entrée') : ?>
                                    <h4 class="card-text color"><?= $dish->name ?></h4>
                                    <p class="allergens card-text">
                                        <?php foreach ($dish->allergens as $allergen) : ?>
                                            <?= $allergen->name ?>
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="color">Plats</h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Plat') : ?>
                                    <h4 class="card-text color"><?= $dish->name ?></h4>
                                    <p class="allergens card-text">
                                        <?php foreach ($dish->allergens as $allergen) : ?>
                                            <?= $allergen->name ?>
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="color">Desserts</h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Dessert') : ?>
                                    <h4 class="card-text color"><?= $dish->name ?></h4>
                                    <p class="allergens card-text">
                                        <?php foreach ($dish->allergens as $allergen) : ?>
                                            <?= $allergen->name ?>
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <h1 class="color">Aucun menu</h1>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <h1 class="text color"><?= h($info->message) ?></h1>
    </div>

</div>

<style>
.color {
    color: <?= h($info->color) ?>;
    font-family: <?= h($info->font) ?>;
}
</style>