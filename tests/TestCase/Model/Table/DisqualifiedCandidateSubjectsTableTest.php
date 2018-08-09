<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisqualifiedCandidateSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisqualifiedCandidateSubjectsTable Test Case
 */
class DisqualifiedCandidateSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisqualifiedCandidateSubjectsTable
     */
    public $DisqualifiedCandidateSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disqualified_candidate_subjects',
        'app.subjects',
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
        $config = TableRegistry::getTableLocator()->exists('DisqualifiedCandidateSubjects') ? [] : ['className' => DisqualifiedCandidateSubjectsTable::class];
        $this->DisqualifiedCandidateSubjects = TableRegistry::getTableLocator()->get('DisqualifiedCandidateSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DisqualifiedCandidateSubjects);

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
