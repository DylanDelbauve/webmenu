<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Information'), ['action' => 'edit', $information->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Information'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Information'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="informations view content">
            <h3><?= h($information->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($information->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($information->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
