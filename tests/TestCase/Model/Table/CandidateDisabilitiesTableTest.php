<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateDisabilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateDisabilitiesTable Test Case
 */
class CandidateDisabilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateDisabilitiesTable
     */
    public $CandidateDisabilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_disabilities',
        'app.candidates',
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
        $config = TableRegistry::getTableLocator()->exists('CandidateDisabilities') ? [] : ['className' => CandidateDisabilitiesTable::class];
        $this->CandidateDisabilities = TableRegistry::getTableLocator()->get('CandidateDisabilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateDisabilities);

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
