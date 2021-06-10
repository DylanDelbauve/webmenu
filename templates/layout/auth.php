<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Connexion
    </title>
    <?php 
        use Cake\Core\Configure;
        $icon = Configure::read('Options.logo');
    
    ?>
    <link rel="shortcut icon" href="/img/<?= $icon ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'bootstrap.min', 'auth']) ?>
    <?= $this->Html->script(['jquery', 'bootstrap.min','app']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="flash">
        <?= $this->Flash->render() ?>
    </div>
    <main id="content">
        <?= $this->fetch('content') ?>
    </main>
    <footer>
    </footer>
</body>

</html>

<style>
    body {
        background-image: url("../img/<?= h($info['theme']) ?>");
    }
</style>