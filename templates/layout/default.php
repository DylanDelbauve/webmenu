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

$auth = $this->request->getSession()->read('Auth');
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'bootstrap.min', 'main', 'bootstrap-select.min', 'bootstrap-icons']) ?>
    <?= $this->Html->script(['jquery', 'bootstrap.bundle.min', 'app', 'bootstrap-select.min']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">Web menu</a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <?= $this->Html->link('Plats', '/dishes', ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Types de plat', '/dishtypes', ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Menus', '/menus', ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Allergènes', '/allergens', ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="bi bi-people-fill"></i>', '/users', ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="bi bi-gear-fill"></i>', '/informations', ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= h($auth->email) ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <?= $this->Html->link('Mon profil', ['controller' => 'Users', 'action' => 'view', $auth->id], ['class' => 'dropdown-item']) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link('Déconnexion', '/users/logout', ['class' => 'dropdown-item']) ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="flash">
        <?= $this->Flash->render() ?>
    </div>
    <main id="content">
        <?= $this->fetch('content') ?>
    </main>
    <footer>
    </footer>

    <div class="modal fade" id="alert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertLabel">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button id="confirm" type="button" class="btn btn-primary" data-dismiss="modal">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>