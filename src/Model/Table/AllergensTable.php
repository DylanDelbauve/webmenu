<?php

// src/Model/Table/AllergensTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AllergensTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Dishes');
    }
}
