<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentreExamTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentreExamTypesTable Test Case
 */
class CentreExamTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentreExamTypesTable
     */
    public $CentreExamTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.centre_exam_types',
        'app.exam_types',
        'app.centres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CentreExamTypes') ? [] : ['className' => CentreExamTypesTable::class];
        $this->CentreExamTypes = TableRegistry::getTableLocator()->get('CentreExamTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentreExamTypes);

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
