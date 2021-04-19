<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <h1><?= h($user->name) ?></h1>
    <form action="">
        <div class="form-group">
            <input type="email" class="form-control" name="" id="" readonly value="<?= h($user->email) ?>">
        </div>
        <div class="btn-group">
        <?php if($user->id == $auth->id): ?>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link('Changer le mot de passe', ['action' => 'changePassword', $user->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
            <?= $this->Html->link('Retour', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </form>
</div>