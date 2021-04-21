<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DishesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DishesTable Test Case
 */
class DishesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DishesTable
     */
    protected $Dishes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dishes',
        'app.Allergens',
        'app.Menus',
        'app.DishTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dishes') ? [] : ['className' => DishesTable::class];
        $this->Dishes = $this->getTableLocator()->get('Dishes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dishes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
