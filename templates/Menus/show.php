
<div class="company">
    <img src="/img/logo.png"  width="100px" alt="">
    <h1><?= h($info->company_name) ?></h1>
</div>

<div id="main" class="container-fluid">

    <div class="row">
        <h1 id="date" class="col-md-4 text color"></h1>
    </div>
    <?php if ($menu != null) : ?>
        <div class="row dish">
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
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
        </div>
    <?php else : ?>
        <h1 class="text color height">Aucun menu</h1>
    <?php endif; ?>
    <div class="row">
        <h1 class="col-md-4 text color"><?= h($info->message) ?></h1>
    </div>


</div>

<style>
    .color {
        color: <?= h($info->color) ?>;
        font-family: <?= h($info->font) ?>;
    }
</style>