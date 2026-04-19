<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseHolesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseHolesTable Test Case
 */
class CourseHolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseHolesTable
     */
    protected $CourseHoles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CourseHoles',
        'app.Courses',
        'app.CourseHoleDistances',
        'app.RoundHoles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CourseHoles') ? [] : ['className' => CourseHolesTable::class];
        $this->CourseHoles = $this->getTableLocator()->get('CourseHoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CourseHoles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CourseHolesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CourseHolesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
