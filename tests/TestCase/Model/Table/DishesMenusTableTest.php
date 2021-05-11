<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DishesMenusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DishesMenusTable Test Case
 */
class DishesMenusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DishesMenusTable
     */
    protected $DishesMenus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DishesMenus',
        'app.Dishes',
        'app.Menus',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DishesMenus') ? [] : ['className' => DishesMenusTable::class];
        $this->DishesMenus = $this->getTableLocator()->get('DishesMenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DishesMenus);

        parent::tearDown();
    }
}
