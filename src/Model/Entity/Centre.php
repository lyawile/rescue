<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Centre Entity
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property string $ownership
 * @property string $detail
 * @property string $principal_name
 * @property string $principal_phone
 * @property string $contact_one
 * @property string $contact_two
 * @property float $district_distance
 * @property string $centre_type
 * @property int $district_id
 *
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Candidate[] $candidates
 * @property \App\Model\Entity\DisqualifiedCandidate[] $disqualified_candidates
 * @property \App\Model\Entity\GroupDistrictRegionSchoolUser[] $group_district_region_school_users
 * @property \App\Model\Entity\Practical[] $practicals
 */
class Centre extends Entity
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
        'name' => true,
        'ownership' => true,
        'detail' => true,
        'principal_name' => true,
        'principal_phone' => true,
        'contact_one' => true,
        'contact_two' => true,
        'district_distance' => true,
        'centre_type' => true,
        'district_id' => true,
        'district' => true,
        'candidates' => true,
        'disqualified_candidates' => true,
        'group_district_region_school_users' => true,
        'practicals' => true
    ];
}
