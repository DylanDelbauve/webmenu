<div class="container form">
    <h1>Initialisation du système</h1>
    <?= $this->Form->create(null, ['id' => 'form']) ?>

    <fieldset>
        <legend>Base de données</legend>
        <div class="alert alert-warning" role="alert">
            Ces informations permettront au système de créer et de gérer la base de données
        </div>
        <input type="text" name="ip" id="ip" class="form-control mb-3" placeholder="Adresse ip de la base de données">
        <input type="text" name="username" class="form-control mb-3" placeholder="Utilisateur de la base de données">
        <input type="password" name="password" class="form-control mb-3" placeholder="Mot de passe de la base de données">
    </fieldset>

    <?= $this->Form->button(__('Suivant'), ['class' => 'btn btn-primary', 'id' => 'save']) ?>
    <?= $this->Form->end() ?>
</div>