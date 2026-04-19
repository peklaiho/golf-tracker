<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CourseTeesFixture
 */
class CourseTeesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'cr' => 1,
                'slope' => 1,
            ],
        ];
        parent::init();
    }
}
