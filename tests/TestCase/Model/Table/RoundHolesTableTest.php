<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoundHolesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoundHolesTable Test Case
 */
class RoundHolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoundHolesTable
     */
    protected $RoundHoles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.RoundHoles',
        'app.Rounds',
        'app.CourseHoles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RoundHoles') ? [] : ['className' => RoundHolesTable::class];
        $this->RoundHoles = $this->getTableLocator()->get('RoundHoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RoundHoles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\RoundHolesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\RoundHolesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
