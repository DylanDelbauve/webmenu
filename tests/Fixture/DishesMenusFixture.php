<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DishesMenusFixture
 */
class DishesMenusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'dishes_menus';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'menu_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dish_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'priority' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'menu_id' => ['type' => 'index', 'columns' => ['menu_id'], 'length' => []],
            'dish_id' => ['type' => 'index', 'columns' => ['dish_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'dishes_menus_ibfk_2' => ['type' => 'foreign', 'columns' => ['dish_id'], 'references' => ['dishes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'dishes_menus_ibfk_1' => ['type' => 'foreign', 'columns' => ['menu_id'], 'references' => ['menus', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'menu_id' => 1,
                'dish_id' => 1,
                'priority' => 1,
            ],
        ];
        parent::init();
    }
}
