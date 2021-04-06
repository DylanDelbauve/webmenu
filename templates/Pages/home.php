<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
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

    <?= $this->Html->css(['bootstrap.min', 'main']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <?= $this->Html->link('Home', '/', ['class' => 'nav-link']) ?>
                </li>
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
            </ul>
        </div>
    </nav>

    <div class="container-fluid row">
        <div class="col-lg-3">
        </div>
        <div class="col-xl-6"><iframe src="/menus/show" frameborder="0" width="100%" height="100%"></iframe></div>
        <div class="col-xl-3"></div>

    </div>
</body>

</html>