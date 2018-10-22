<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotificationsUser Entity
 *
 * @property int $id
 * @property int $notification_id
 * @property int $user_id
 * @property int $is_read
 *
 * @property \App\Model\Entity\Notification $notification
 * @property \App\Model\Entity\User $user
 */
class NotificationsUser extends Entity
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
        'notification_id' => true,
        'user_id' => true,
        'is_read' => true,
        'notification' => true,
        'user' => true
    ];
}
