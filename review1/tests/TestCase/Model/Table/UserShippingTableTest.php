<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserShippingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserShippingTable Test Case
 */
class UserShippingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserShippingTable
     */
    public $UserShipping;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserShipping') ? [] : ['className' => 'App\Model\Table\UserShippingTable'];
        $this->UserShipping = TableRegistry::get('UserShipping', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserShipping);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
