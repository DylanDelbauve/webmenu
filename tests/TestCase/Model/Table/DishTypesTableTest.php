<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DishTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DishTypesTable Test Case
 */
class DishTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DishTypesTable
     */
    protected $DishTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DishTypes',
        'app.Dishes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DishTypes') ? [] : ['className' => DishTypesTable::class];
        $this->DishTypes = $this->getTableLocator()->get('DishTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DishTypes);

        parent::tearDown();
    }
}
