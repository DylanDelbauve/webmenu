<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\DishesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\DishesController Test Case
 *
 * @uses \App\Controller\DishesController
 */
class DishesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dishes',
        'app.DishTypes',
        'app.Allergens',
        'app.Menus',
        'app.AllergensDishes',
        'app.DishesMenus',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test editallergens method
     *
     * @return void
     */
    public function testEditallergens(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
