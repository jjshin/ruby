<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingcostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingcostsTable Test Case
 */
class ShippingcostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShippingcostsTable
     */
    public $Shippingcosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shippingcosts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shippingcosts') ? [] : ['className' => 'App\Model\Table\ShippingcostsTable'];
        $this->Shippingcosts = TableRegistry::get('Shippingcosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shippingcosts);

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
}
