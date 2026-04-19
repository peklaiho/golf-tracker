<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoundHolesFixture
 */
class RoundHolesFixture extends TestFixture
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
                'round_id' => 1,
                'course_hole_id' => 1,
                'strokes' => 1,
                'fairway_hit' => 1,
                'green_in_reg' => 1,
                'putts' => 1,
            ],
        ];
        parent::init();
    }
}
