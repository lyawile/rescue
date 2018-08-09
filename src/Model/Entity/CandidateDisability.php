<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CandidateDisability Entity
 *
 * @property int $id
 * @property int $candidates_id
 * @property int $disabilities_id
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\Disability $disability
 */
class CandidateDisability extends Entity
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
        'candidates_id' => true,
        'disabilities_id' => true,
        'candidate' => true,
        'disability' => true
    ];
}
