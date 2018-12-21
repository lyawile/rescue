<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GroupDistrictRegionSchoolUser Entity
 *
 * @property int $id
 * @property int $district_id
 * @property int $region_id
 * @property int $group_id
 * @property int $user_id
 * @property int $centre_id
 *
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Centre $centre
 */
class GroupDistrictRegionSchoolUser extends Entity
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
        'id' => true,
        'district_id' => true,
        'region_id' => true,
        'group_id' => true,
        'user_id' => true,
        'centre_id' => true,
        'district' => true,
        'region' => true,
        'group' => true,
        'user' => true,
        'centre' => true
    ];
}
