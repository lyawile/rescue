<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * District Entity
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property string $detail
 * @property int $region_id
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Centre[] $centres
 * @property \App\Model\Entity\GroupDistrictRegionSchoolUser[] $group_district_region_school_users
 */
class District extends Entity
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
        'detail' => true,
        'region_id' => true,
        'region' => true,
        'centres' => true,
        'group_district_region_school_users' => true
    ];
}
