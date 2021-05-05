<div class="container form">
    <h1>Initialisation du système</h1>
    <?= $this->Form->create(null) ?>

    <fieldset>
        <legend>Base de données</legend>
        <div class="alert alert-warning" role="alert">
            Ces informations viennent de vous, elles ne sont pas crées par le système
        </div>
        <input type="text" name="username" class="form-control mb-3" placeholder="Utilisateur de la base de données">
        <input type="password" name="password" class="form-control mb-3" placeholder="Mot de passe de la base de données">
    </fieldset>

    <?= $this->Form->button(__('Suivant'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>