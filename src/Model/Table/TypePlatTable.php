<?php
// src/Model/Table/TypePlatTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class TypePlatTable extends Table
{

    public function initialize(array $config)
    {
        $this->setEntityClass('App\Model\Entity\TypePlat');
    }
}
