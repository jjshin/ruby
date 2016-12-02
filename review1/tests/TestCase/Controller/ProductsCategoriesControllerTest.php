<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductsCategoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProductsCategoriesController Test Case
 */
class ProductsCategoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products_categories',
        'app.categories',
        'app.products',
        'app.lineitems',
        'app.orders',
        'app.users',
        'app.couriers',
        'app.vendors',
        'app.user_shippings'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
