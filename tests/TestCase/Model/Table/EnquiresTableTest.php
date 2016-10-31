<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnquiresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnquiresTable Test Case
 */
class EnquiresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EnquiresTable
     */
    public $Enquires;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.enquires',
        'app.users',
        'app.products',
        'app.subcategory',
        'app.suppliers',
        'app.brands'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Enquires') ? [] : ['className' => 'App\Model\Table\EnquiresTable'];
        $this->Enquires = TableRegistry::get('Enquires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enquires);

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
