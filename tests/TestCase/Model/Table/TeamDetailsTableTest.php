<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamDetailsTable Test Case
 */
class TeamDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamDetailsTable
     */
    public $TeamDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.team_details',
        'app.teams',
        'app.users',
        'app.employee_salaries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeamDetails') ? [] : ['className' => 'App\Model\Table\TeamDetailsTable'];
        $this->TeamDetails = TableRegistry::get('TeamDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamDetails);

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
