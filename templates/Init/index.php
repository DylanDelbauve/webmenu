<div class="container form">
    <h1>Initialisation du système</h1>
    <?= $this->Form->create(null,  ['type' => 'file']) ?>


    <fieldset>
        <legend>Administrateur</legend>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ville" aria-label="Ville" aria-describedby="ville" name="city">
            <div class="input-group-append">
                <span class="input-group-text" id="ville">@webmenu.com</span>
            </div>
        </div>
        <input type="password" name="password" id="" class="form-control mb-3" placeholder="Mot de passe de l'administrateur">
    </fieldset>
    
    <?= $this->Form->button(__('Suivant'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>