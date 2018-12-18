<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisqualifiedCandidatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisqualifiedCandidatesTable Test Case
 */
class DisqualifiedCandidatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisqualifiedCandidatesTable
     */
    public $DisqualifiedCandidates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disqualified_candidates',
        'app.exam_types',
        'app.centres',
        'app.disability_disqualified_candidates',
        'app.disqualified_candidate_qualifications',
        'app.disqualified_candidate_subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DisqualifiedCandidates') ? [] : ['className' => DisqualifiedCandidatesTable::class];
        $this->DisqualifiedCandidates = TableRegistry::getTableLocator()->get('DisqualifiedCandidates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DisqualifiedCandidates);

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
