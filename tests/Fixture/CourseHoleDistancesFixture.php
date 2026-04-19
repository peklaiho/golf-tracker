<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CourseHoleDistancesFixture
 */
class CourseHoleDistancesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'course_hole_id' => 1,
                'course_tee_id' => 1,
                'distance' => 1,
            ],
        ];
        parent::init();
    }
}
