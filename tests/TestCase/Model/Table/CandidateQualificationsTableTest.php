<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateQualificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateQualificationsTable Test Case
 */
class CandidateQualificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateQualificationsTable
     */
    public $CandidateQualifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_qualifications',
        'app.candidates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CandidateQualifications') ? [] : ['className' => CandidateQualificationsTable::class];
        $this->CandidateQualifications = TableRegistry::getTableLocator()->get('CandidateQualifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateQualifications);

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
