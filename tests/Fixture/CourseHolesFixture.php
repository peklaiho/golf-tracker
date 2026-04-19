<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CourseHolesFixture
 */
class CourseHolesFixture extends TestFixture
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
                'course_id' => 1,
                'number' => 1,
                'par' => 1,
                'hcp' => 1,
            ],
        ];
        parent::init();
    }
}
