<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $company_logo
 * @property string $theme_img
 */
class Information extends Entity
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
        'company_name' => true,
        'company_logo' => true,
        'theme_img' => true,
    ];
}
