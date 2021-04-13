<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Connexion</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Veuillez s'il vous plaît entrer votre nom d'utilisateur et votre mot de passe") ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Connexion')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Mot de passe oublié', ['action' => 'forgotPassword'], ['class' => 'button']); ?>
</div>