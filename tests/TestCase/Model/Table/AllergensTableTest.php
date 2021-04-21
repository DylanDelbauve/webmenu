<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllergensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllergensTable Test Case
 */
class AllergensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AllergensTable
     */
    protected $Allergens;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Allergens',
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
        $config = $this->getTableLocator()->exists('Allergens') ? [] : ['className' => AllergensTable::class];
        $this->Allergens = $this->getTableLocator()->get('Allergens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Allergens);

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
