<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillItemCandidatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillItemCandidatesTable Test Case
 */
class BillItemCandidatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillItemCandidatesTable
     */
    public $BillItemCandidates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bill_item_candidates',
        'app.candidates',
        'app.bill_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BillItemCandidates') ? [] : ['className' => BillItemCandidatesTable::class];
        $this->BillItemCandidates = TableRegistry::getTableLocator()->get('BillItemCandidates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BillItemCandidates);

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
