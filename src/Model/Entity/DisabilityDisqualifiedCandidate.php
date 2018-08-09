<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DisabilityDisqualifiedCandidate Entity
 *
 * @property int $id
 * @property int $disabilities_id
 * @property int $disqualified_candidates_id
 *
 * @property \App\Model\Entity\Disability $disability
 * @property \App\Model\Entity\DisqualifiedCandidate $disqualified_candidate
 */
class DisabilityDisqualifiedCandidate extends Entity
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
        'disabilities_id' => true,
        'disqualified_candidates_id' => true,
        'disability' => true,
        'disqualified_candidate' => true
    ];
}
