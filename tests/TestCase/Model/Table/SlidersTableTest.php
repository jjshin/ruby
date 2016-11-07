<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlidersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlidersTable Test Case
 */
class SlidersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SlidersTable
     */
    public $Sliders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sliders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sliders') ? [] : ['className' => 'App\Model\Table\SlidersTable'];
        $this->Sliders = TableRegistry::get('Sliders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sliders);

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
