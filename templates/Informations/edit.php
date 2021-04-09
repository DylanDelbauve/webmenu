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
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
