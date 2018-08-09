<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $name
<<<<<<< HEAD
=======
 *
 * @property \Acl\Model\Entity\Aro[] $aro
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
 */
class Group extends Entity
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
<<<<<<< HEAD
        'name' => true
    ];
=======
        'name' => true,
        'aro' => true
    ];

    public function parentNode()
    {
        return null;
    }
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
}
