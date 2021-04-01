<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MenusTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Dishes');
    }
}