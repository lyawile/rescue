<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisabilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisabilitiesTable Test Case
 */
class DisabilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisabilitiesTable
     */
    public $Disabilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disabilities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Disabilities') ? [] : ['className' => DisabilitiesTable::class];
        $this->Disabilities = TableRegistry::getTableLocator()->get('Disabilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disabilities);

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
