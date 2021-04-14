<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadHelper('Breadcrumbs');
        $this->loadHelper('Flash');
        $this->loadHelper('Paginator');
        $this->loadHelper('Time');
        $this->Paginator->setTemplates([
            'prevActive' => '<li class="page-item"><a href="{{url}}" class="page-link"><span aria-hidden="true">&laquo;</span></a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a href="{{url}}" class="page-link"><span aria-hidden="true">&laquo;</span></a></li>',
            'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a href="{{url}}" class="page-link"><span aria-hidden="true">&raquo;</span></a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a href="{{url}}" class="page-link"><span aria-hidden="true">&raquo;</span></a></li>',
            'sort' => '<a class="btn btn-primary" href="{{url}}">{{text}}</a>',
            'sortAsc' => '<a class="btn btn-primary" href="{{url}}">{{text}} <span class="badge badge-light">Croissant</span></a>',
            'sortDesc' => '<a class="btn btn-primary" href="{{url}}">{{text}} <span class="badge badge-light">Décroissant</span></a>',
        
        ]);
    }
}
