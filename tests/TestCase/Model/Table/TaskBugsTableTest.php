<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskBugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskBugsTable Test Case
 */
class TaskBugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskBugsTable
     */
    public $TaskBugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.task_bugs',
        'app.tasks',
        'app.projects',
        'app.attachments',
        'app.attachment_types',
        'app.sprints'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaskBugs') ? [] : ['className' => 'App\Model\Table\TaskBugsTable'];
        $this->TaskBugs = TableRegistry::get('TaskBugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaskBugs);

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
