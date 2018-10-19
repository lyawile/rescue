<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CandidateCa Entity
 *
 * @property int $id
 * @property string $ftwo_centreno
 * @property string $ftwo_candidateno
 * @property string $ftwo_year
 * @property float $y1t1
 * @property float $y1t2
 * @property float $y2t1
 * @property float $project
 * @property string $btp
 * @property int $candidate_subject_id
 *
 * @property \App\Model\Entity\CandidateSubject $candidate_subject
 */
class CandidateCa extends Entity
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
        'ftwo_centreno' => true,
        'ftwo_candidateno' => true,
        'ftwo_year' => true,
        'y1t1' => true,
        'y1t2' => true,
        'y2t1' => true,
        'project' => true,
        'btp' => true,
        'candidate_subject_id' => true,
        'candidate_subject' => true
    ];
}
