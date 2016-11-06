<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TmpcartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TmpcartsTable Test Case
 */
class TmpcartsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TmpcartsTable
     */
    public $Tmpcarts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tmpcarts',
        'app.sessions',
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
        $config = TableRegistry::exists('Tmpcarts') ? [] : ['className' => 'App\Model\Table\TmpcartsTable'];
        $this->Tmpcarts = TableRegistry::get('Tmpcarts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tmpcarts);

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
