<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disability Entity
 *
 * @property int $id
 * @property string $name
 * @property string $shortname
 * @property string $details
 *
 * @property \App\Model\Entity\CandidateDisability[] $candidate_disabilities
 */
class Disability extends Entity
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
        'name' => true,
        'shortname' => true,
        'details' => true,
        'candidate_disabilities' => true
    ];
}
