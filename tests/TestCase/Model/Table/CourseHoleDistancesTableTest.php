<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseHoleDistancesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseHoleDistancesTable Test Case
 */
class CourseHoleDistancesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseHoleDistancesTable
     */
    protected $CourseHoleDistances;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CourseHoleDistances',
        'app.CourseHoles',
        'app.CourseTees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CourseHoleDistances') ? [] : ['className' => CourseHoleDistancesTable::class];
        $this->CourseHoleDistances = $this->getTableLocator()->get('CourseHoleDistances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CourseHoleDistances);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CourseHoleDistancesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CourseHoleDistancesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
