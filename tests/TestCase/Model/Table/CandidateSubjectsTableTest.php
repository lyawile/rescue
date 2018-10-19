<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateSubjectsTable Test Case
 */
class CandidateSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateSubjectsTable
     */
    public $CandidateSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_subjects',
        'app.candidates',
        'app.subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CandidateSubjects') ? [] : ['className' => CandidateSubjectsTable::class];
        $this->CandidateSubjects = TableRegistry::getTableLocator()->get('CandidateSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateSubjects);

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
