<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Round Entity
 *
 * @property int $id
 * @property int $player_id
 * @property int $course_tee_id
 * @property \Cake\I18n\DateTime $tee_time
 *
 * @property \App\Model\Entity\Player $player
 * @property \App\Model\Entity\CourseTee $course_tee
 * @property \App\Model\Entity\RoundHole[] $round_holes
 */
class Round extends Entity
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
        'player_id' => true,
        'course_tee_id' => true,
        'tee_time' => true,
        'note' => true,
        'player' => true,
        'course_tee' => true,
        'round_holes' => true,
    ];
}
