<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserShippingController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserShippingController Test Case
 */
class UserShippingControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_shipping',
        'app.users',
        'app.countries',
        'app.orders',
        'app.couriers',
        'app.vendors',
        'app.user_shippings',
        'app.lineitems',
        'app.products',
        'app.categories',
        'app.products_categories'
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
