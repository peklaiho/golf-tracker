<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseHoleDistance Entity
 *
 * @property int $id
 * @property int $course_hole_id
 * @property int $course_tee_id
 * @property int $distance
 *
 * @property \App\Model\Entity\CourseHole $course_hole
 * @property \App\Model\Entity\CourseTee $course_tee
 */
class CourseHoleDistance extends Entity
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
        'course_hole_id' => true,
        'course_tee_id' => true,
        'distance' => true,
        'course_hole' => true,
        'course_tee' => true,
    ];
}
