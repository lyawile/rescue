<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CandidateSubject Entity
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $subject_id
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\Subject $subject
 */
class CandidateSubject extends Entity
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
        'candidate_id' => true,
        'subject_id' => true,
        'candidate' => true,
        'subject' => true
    ];
}
