<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillItemsTable Test Case
 */
class BillItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillItemsTable
     */
    public $BillItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bill_items',
        'app.collections',
        'app.bills',
        'app.bill_item_candidates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BillItems') ? [] : ['className' => BillItemsTable::class];
        $this->BillItems = TableRegistry::getTableLocator()->get('BillItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BillItems);

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
