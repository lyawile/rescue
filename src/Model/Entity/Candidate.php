<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidate Entity
 *
 * @property int $id
 * @property string $number
 * @property string $first_name
 * @property string $other_name
 * @property string $surname
 * @property string $sex
 * @property int $PSLE_number
 * @property int $PSLE_year
 * @property string $ID_number
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $guardian_phone
 * @property int $work_experience
 * @property string $combination
 * @property int $is_repeater
 * @property int $exam_type_id
 * @property int $centre_id
 *
 * @property \App\Model\Entity\ExamType $exam_type
 * @property \App\Model\Entity\Centre $centre
 * @property \App\Model\Entity\BillItemCandidate[] $bill_item_candidates
 * @property \App\Model\Entity\CandidateDisability[] $candidate_disabilities
 * @property \App\Model\Entity\CandidateQualification[] $candidate_qualifications
 * @property \App\Model\Entity\CandidateSubject[] $candidate_subjects
 */
class Candidate extends Entity
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
        'number' => true,
        'first_name' => true,
        'other_name' => true,
        'surname' => true,
        'sex' => true,
        'PSLE_number' => true,
        'PSLE_year' => true,
        'ID_number' => true,
        'date_of_birth' => true,
        'guardian_phone' => true,
        'work_experience' => true,
        'combination' => true,
        'is_repeater' => true,
        'exam_type_id' => true,
        'centre_id' => true,
        'exam_type' => true,
        'centre' => true,
        'bill_item_candidates' => true,
        'candidate_disabilities' => true,
        'candidate_qualifications' => true,
        'candidate_subjects' => true
    ];
}
