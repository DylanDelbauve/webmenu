<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DishTypesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->hasOne('Dishes');
    }
}