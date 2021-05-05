<div class="container form">
    <h1>Initialisation du système</h1>
    <?= $this->Form->create(null,  ['type' => 'file']) ?>

    <fieldset>
        <legend>Options</legend>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="company_name" id="" class="form-control mb-3" placeholder="Nom de l'entreprise">
            </div>
            <div class="form-groupcol-md-6">
                <input type="text" name="message" id="" class="form-control mb-3" placeholder="Message de bon appétit">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="theme">Image de fond du menu</label>
                <?= $this->Form->file('theme', ['class' => 'form-control-file', 'accept' => 'image/*']) ?>
            </div>
            <div class="form-group col-md-6">
                <label for="logo">Logo de l'entreprise</label>
                <?= $this->Form->file('logo', ['class' => 'form-control-file', 'accept' => 'image/*']) ?>
            </div>
        </div>
    </fieldset>

    <?= $this->Form->button(__('Enregistrer'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>