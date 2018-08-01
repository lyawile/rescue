<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Collection Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property float $ammount
 * @property int $exam_type_id
 * @property int $collection_categorie_id
 *
 * @property \App\Model\Entity\ExamType $exam_type
 * @property \App\Model\Entity\CollectionCategory $collection_category
 */
class Collection extends Entity
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
        'name' => true,
        'description' => true,
        'start_date' => true,
        'end_date' => true,
        'ammount' => true,
        'exam_type_id' => true,
        'collection_categorie_id' => true,
        'exam_type' => true,
        'collection_category' => true
    ];
}
