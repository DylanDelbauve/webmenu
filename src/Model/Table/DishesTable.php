<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DishesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Allergens');
    }
}