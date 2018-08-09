<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $other_name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property int $group_id
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\GroupDistrictRegionSchoolUser[] $group_district_region_school_users
 */
class User extends Entity
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
        'first_name' => true,
        'other_name' => true,
        'surname' => true,
        'username' => true,
        'password' => true,
        'email' => true,
        'mobile' => true,
        'group_id' => true,
        'group' => true,
        'group_district_region_school_users' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
