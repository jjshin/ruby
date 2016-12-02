<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsCategoriesTable Test Case
 */
class ProductsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsCategoriesTable
     */
    public $ProductsCategories;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductsCategories') ? [] : ['className' => 'App\Model\Table\ProductsCategoriesTable'];
        $this->ProductsCategories = TableRegistry::get('ProductsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsCategories);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
