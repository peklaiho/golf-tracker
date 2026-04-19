<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoundsFixture
 */
class RoundsFixture extends TestFixture
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
                'player_id' => 1,
                'course_tee_id' => 1,
                'tee_time' => '2026-04-19 05:28:56',
            ],
        ];
        parent::init();
    }
}
