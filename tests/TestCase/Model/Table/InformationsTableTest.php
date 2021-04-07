<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationsTable Test Case
 */
class InformationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationsTable
     */
    protected $Informations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Informations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Informations') ? [] : ['className' => InformationsTable::class];
        $this->Informations = $this->getTableLocator()->get('Informations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Informations);

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
