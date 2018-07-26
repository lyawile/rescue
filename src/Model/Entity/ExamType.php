<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamType Entity
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $short_name
 */
class ExamType extends Entity
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
        'code' => true,
        'name' => true,
        'short_name' => true
    ];
}