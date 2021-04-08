<div class="company">
    <img src="/img/logo.svg" height="64px" width="64px" alt="">
    <h1>Cercle Mixte de Besançon</h1>
</div>
<div id="main" class="container-fluid">
    <div class="row">
            
            <div class="text">
                <h1 id="date"></h1>
            </div>
    </div>
    <div class="row">
        <div id="menu" class="container-fluid">
            <?php if ($menu != null) : ?>
                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                            <h2>Entrée</h2>
                        </div>
                        <div class="card-body">

                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Entrée') : ?>
                                    <h4 class="card-text"><?= $dish->name ?></h4>
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
                            <h2>Plat</h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Plat') : ?>
                                    <h4 class="card-text"><?= $dish->name ?></h4>
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
                            <h2>Dessert</h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($menu->dishes as $dish) : ?>
                                <?php if ($dish->dish_type->name === 'Dessert') : ?>
                                    <h4 class="card-text"><?= $dish->name ?></h4>
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
                <h1>Aucun menu</h1>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <h1 class="text">Et bon appétit</h1>
    </div>

</div>