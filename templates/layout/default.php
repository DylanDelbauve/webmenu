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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'bootstrap.min', 'milligram.min', 'cake', 'main']) ?>
    <?= $this->Html->script(['app', 'jquery', 'animations']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Sidebar header</h3>
            </div>
            <ul>
                <li class="bar-item">
                    <?= $this->Html->link('Home', '/', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">
                    <?= $this->Html->link('Plats', '/dishes', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">
                    <?= $this->Html->link('Types de plat', '/dishtypes', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">
                    <?= $this->Html->link('Menus', '/menus', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">
                    <?= $this->Html->link('Allergènes', '/allergens', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">
                    <?= $this->Html->link('Options', '/informations/edit', ['class' => 'nav-link']) ?>
                </li>
                <li class="bar-item">

                </li>
            </ul>
        </nav>
        <div id="content">
            <nav id="top-bar">
                <button id="toggle-sidebar" onclick="toggleSideBar()">Menu</button><?= $this->Flash->render() ?>
                <?= $this->Html->link('Déconnexion', '/users/logout', ['class' => 'nav-link btn btn-secondary']) ?>
            </nav>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>

</html>