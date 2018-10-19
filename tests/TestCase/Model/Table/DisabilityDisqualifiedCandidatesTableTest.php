<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisabilityDisqualifiedCandidatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisabilityDisqualifiedCandidatesTable Test Case
 */
class DisabilityDisqualifiedCandidatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisabilityDisqualifiedCandidatesTable
     */
    public $DisabilityDisqualifiedCandidates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disability_disqualified_candidates',
        'app.disabilities',
        'app.disqualified_candidates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DisabilityDisqualifiedCandidates') ? [] : ['className' => DisabilityDisqualifiedCandidatesTable::class];
        $this->DisabilityDisqualifiedCandidates = TableRegistry::getTableLocator()->get('DisabilityDisqualifiedCandidates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DisabilityDisqualifiedCandidates);

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
