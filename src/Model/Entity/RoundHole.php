<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoundHole Entity
 *
 * @property int $id
 * @property int $round_id
 * @property int $course_hole_id
 * @property int $strokes
 * @property int|null $fairway_hit
 * @property int|null $green_in_reg
 * @property int|null $putts
 *
 * @property \App\Model\Entity\Round $round
 * @property \App\Model\Entity\CourseHole $course_hole
 */
class RoundHole extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'round_id' => true,
        'course_hole_id' => true,
        'strokes' => true,
        'fairway_hit' => true,
        'green_in_reg' => true,
        'putts' => true,
        'round' => true,
        'course_hole' => true,
    ];
}
