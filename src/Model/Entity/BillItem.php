<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BillItem Entity
 *
 * @property int $id
 * @property string $detail
 * @property float $ammount
 * @property float $equivalent_amount
 * @property float $misc_amount
 * @property float $quantity
 * @property string $unit
 * @property int $collection_id
 * @property int $bill_id
 *
 * @property \App\Model\Entity\Collection $collection
 * @property \App\Model\Entity\Bill $bill
 * @property \App\Model\Entity\BillItemCandidate[] $bill_item_candidates
 */
class BillItem extends Entity
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
        'detail' => true,
        'ammount' => true,
        'equivalent_amount' => true,
        'misc_amount' => true,
        'quantity' => true,
        'unit' => true,
        'collection_id' => true,
        'bill_id' => true,
        'collection' => true,
        'bill' => true,
        'bill_item_candidates' => true
    ];
}
