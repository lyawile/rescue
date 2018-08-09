<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DisqualifiedCandidateSubject Entity
 *
 * @property int $id
 * @property int $subjects_id
 * @property int $disqualified_candidates_id
 *
 * @property \App\Model\Entity\Subject $subject
 * @property \App\Model\Entity\DisqualifiedCandidate $disqualified_candidate
 */
class DisqualifiedCandidateSubject extends Entity
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
        'subjects_id' => true,
        'disqualified_candidates_id' => true,
        'subject' => true,
        'disqualified_candidate' => true
    ];
}
