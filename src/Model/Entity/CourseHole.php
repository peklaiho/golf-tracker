<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseHole Entity
 *
 * @property int $id
 * @property int $course_id
 * @property int $number
 * @property int $par
 * @property int $hcp
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\CourseHoleDistance[] $course_hole_distances
 * @property \App\Model\Entity\RoundHole[] $round_holes
 */
class CourseHole extends Entity
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
        'course_id' => true,
        'number' => true,
        'par' => true,
        'hcp' => true,
        'course' => true,
        'course_hole_distances' => true,
        'round_holes' => true,
    ];
}
