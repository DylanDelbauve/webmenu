<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DishesMenu Entity
 *
 * @property int $id
 * @property int $menu_id
 * @property int $dish_id
 * @property int $priority
 *
 * @property \App\Model\Entity\Dish $dish
 * @property \App\Model\Entity\Menu $menu
 */
class DishesMenu extends Entity
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
        'menu_id' => true,
        'dish_id' => true,
        'priority' => true,
        'dish' => true,
        'menu' => true,
    ];
}
