<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentresTable Test Case
 */
class CentresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentresTable
     */
    public $Centres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.centres',
        'app.districts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Centres') ? [] : ['className' => CentresTable::class];
        $this->Centres = TableRegistry::getTableLocator()->get('Centres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Centres);

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
