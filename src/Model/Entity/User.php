<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
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
 * @property \Acl\Model\Entity\Aro[] $aro
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\GroupDistrictRegionSchoolUser[] $group_district_region_school_users
 * @property \App\Model\Entity\Notification[] $notifications
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
        'group_district_region_school_users' => true,
        'notifications' => true,
        'aro' => true,
        'group' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $groupId = $this->group_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $groupId = $user->group_id;
        }
        if (!$groupId) {
            return null;
        }
        return ['Groups' => ['id' => $groupId]];
    }
}
