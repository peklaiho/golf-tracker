<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseTeesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseTeesTable Test Case
 */
class CourseTeesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseTeesTable
     */
    protected $CourseTees;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CourseTees',
        'app.Courses',
        'app.CourseHoleDistances',
        'app.Rounds',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CourseTees') ? [] : ['className' => CourseTeesTable::class];
        $this->CourseTees = $this->getTableLocator()->get('CourseTees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CourseTees);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CourseTeesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CourseTeesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
