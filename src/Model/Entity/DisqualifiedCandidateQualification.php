<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DisqualifiedCandidateQualification Entity
 *
 * @property int $id
 * @property string $centre_number
 * @property string $candidate_number
 * @property int $exam_year
 * @property int $experience
 * @property int $disqualified_candidates_id
 *
 * @property \App\Model\Entity\DisqualifiedCandidate $disqualified_candidate
 */
class DisqualifiedCandidateQualification extends Entity
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
        'centre_number' => true,
        'candidate_number' => true,
        'exam_year' => true,
        'experience' => true,
        'disqualified_candidates_id' => true,
        'disqualified_candidate' => true
    ];
}
