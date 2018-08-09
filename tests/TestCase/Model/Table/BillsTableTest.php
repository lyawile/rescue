<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillsTable Test Case
 */
class BillsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillsTable
     */
    public $Bills;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
<<<<<<< HEAD
        'app.bills'
=======
        'app.bills',
        'app.bill_items',
        'app.payments'
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bills') ? [] : ['className' => BillsTable::class];
        $this->Bills = TableRegistry::getTableLocator()->get('Bills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bills);

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
