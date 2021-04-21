<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dish Entity
 *
 * @property int $id
 * @property string $name
 * @property int $dish_type_id
 *
 * @property \App\Model\Entity\Allergen[] $allergens
 * @property \App\Model\Entity\Menu[] $menus
 * @property \App\Model\Entity\DishType $dish_type
 */
class Dish extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'dish_type_id' => true,
        'allergens' => true,
        'menus' => true,
        'dish_type' => true,
    ];
}
