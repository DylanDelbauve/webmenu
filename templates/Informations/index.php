<div class="container form">
    <h1>Informations de l'application</h1>
    <?= $this->Form->create(null,  ['type' => 'file']) ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <?php

    use Cake\Core\Configure;

echo $this->Form->control('company_name', ['class' => 'form-control', 'label' => ['text' => 'Nom de l\'entreprise'], 'value' => $information['company_name']]); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('message', ['class' => 'form-control', 'label' => ['text' => 'Message à afficher sur le menu'], 'value' => $information['message']]); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="logo">Logo (png/svg/jpg)</label>
            <?php echo $this->Form->file('logo', ['class' => 'form-control-file', 'accept' => 'image/*']); ?>
        </div>
        <div class="form-group col-md-6">
            <p>Logo actuel</p>
            <img src="/img/<?= $information['logo']?>"  width="64" alt="">
        </div>
        
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="theme">Thème (png/svg/jpg)</label>
            <?php echo $this->Form->file('theme', ['class' => 'form-control-file', 'accept' => 'image/*']); ?>
        </div>
        <div class="form-group col-md-6">
            <p>Thème actuel</p>
            <img src="/img/<?= $information['theme']?>" height="108" width="192" alt="">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="font">Police d'écriture</label>
            <select name="font" id="font" class="form-control">
                <option style="font-family: Arial, sans-serif;" value="Arial, sans-serif">Arial</option>
                <option style="font-family: Didot, serif;" value="Didot, serif">Didot</option>
                <option style="font-family: Andale Mono, monospace;" value="Andale Mono, monospace">Andale</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="font">Couleur de la police</label>
            <?php echo $this->Form->color('color', ['class' => 'form-control', 'value' => $information['color']]); ?>
        </div>
    </div>

    <?= $this->Form->button(__('Enregistrer'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>