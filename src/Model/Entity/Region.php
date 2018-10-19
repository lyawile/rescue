<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Region Entity
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property string $detail
 *
 * @property \App\Model\Entity\District[] $districts
 * @property \App\Model\Entity\GroupDistrictRegionSchoolUser[] $group_district_region_school_users
 */
class Region extends Entity
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
        'districts' => true,
        'group_district_region_school_users' => true
    ];
}
