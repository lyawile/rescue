<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CentreExamType Entity
 *
 * @property int $id
 * @property int $exam_type_id
 * @property int $centre_id
 *
 * @property \App\Model\Entity\ExamType $exam_type
 * @property \App\Model\Entity\Centre $centre
 */
class CentreExamType extends Entity
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
        'exam_type_id' => true,
        'centre_id' => true,
        'exam_type' => true,
        'centre' => true
    ];
}
