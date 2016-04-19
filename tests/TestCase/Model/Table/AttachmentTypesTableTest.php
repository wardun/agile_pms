<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttachmentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttachmentTypesTable Test Case
 */
class AttachmentTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttachmentTypesTable
     */
    public $AttachmentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attachment_types',
        'app.attachments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttachmentTypes') ? [] : ['className' => 'App\Model\Table\AttachmentTypesTable'];
        $this->AttachmentTypes = TableRegistry::get('AttachmentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttachmentTypes);

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
}
