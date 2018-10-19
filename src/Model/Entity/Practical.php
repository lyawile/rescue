<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Practical Entity
 *
 * @property int $id
 * @property int $practical_type
 * @property int $group_A
 * @property int $group_B
 * @property int $group_C
 * @property int $total
 * @property int $subject_id
 * @property int $centre_id
 *
 * @property \App\Model\Entity\Subject $subject
 * @property \App\Model\Entity\Centre $centre
 */
class Practical extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'practical_type' => true,
        'group_A' => true,
        'group_B' => true,
        'group_C' => true,
        'total' => true,
        'subject_id' => true,
        'centre_id' => true,
        'subject' => true,
        'centre' => true
    ];
}
