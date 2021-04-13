<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="informations form content">
            <?= $this->Form->create($information,  ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Information') ?></legend>
                <?php
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('message');
                ?>
                <div>
                    <p>Logo actuel</p>
                    <img src="/img/logo.svg" height="64" width="64" alt="">
                    <?php echo $this->Form->file('logo'); ?>
                </div>
                <div>
                    <p>Thème actuel</p>
                    <img src="/img/theme.jpg" height="108" width="192" alt="">
                    <?php echo $this->Form->file('theme'); ?>
                </div>

                <div>
                    <p>Police</p>
                    <select name="font" id="">
                        <option style="font-family: Arial, sans-serif;" value="Arial, sans-serif">Arial</option>
                        <option style="font-family: Didot, serif;" value="Didot, serif">Didot</option>
                        <option style="font-family: Andale Mono, monospace;" value="Andale Mono, monospace">Andale</option>
                    </select>
                </div>

                <div>
                    <p>Couleur police</p>
                    <?php echo $this->Form->color('color'); ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
