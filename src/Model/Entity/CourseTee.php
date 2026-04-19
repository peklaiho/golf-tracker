<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseTee Entity
 *
 * @property int $id
 * @property int $course_id
 * @property string $name
 * @property int|null $cr
 * @property int|null $slope
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\CourseHoleDistance[] $course_hole_distances
 * @property \App\Model\Entity\Round[] $rounds
 */
class CourseTee extends Entity
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
        'name' => true,
        'order' => true,
        'cr' => true,
        'slope' => true,
        'course' => true,
        'course_hole_distances' => true,
        'rounds' => true,
    ];
}
