<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificationsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificationsUsersTable Test Case
 */
class NotificationsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificationsUsersTable
     */
    public $NotificationsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notifications_users',
        'app.notifications',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NotificationsUsers') ? [] : ['className' => NotificationsUsersTable::class];
        $this->NotificationsUsers = TableRegistry::getTableLocator()->get('NotificationsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NotificationsUsers);

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
