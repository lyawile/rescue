<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamType Entity
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $short_name
 * @property int $has_ca
 *
 * @property \App\Model\Entity\Candidate[] $candidates
 * @property \App\Model\Entity\CentreExamType[] $centre_exam_types
 * @property \App\Model\Entity\Collection[] $collections
 * @property \App\Model\Entity\DisqualifiedCandidate[] $disqualified_candidates
 * @property \App\Model\Entity\Subject[] $subjects
 */
class ExamType extends Entity
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
        'code' => true,
        'name' => true,
        'short_name' => true,
        'has_ca' => true,
        'candidates' => true,
        'centre_exam_types' => true,
        'collections' => true,
        'disqualified_candidates' => true,
        'subjects' => true
    ];
}
