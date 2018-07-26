<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bill Entity
 *
 * @property int $id
 * @property string $reference
 * @property float $amount
 * @property float $equivalent_amount
 * @property float $misc_amount
 * @property \Cake\I18n\FrozenTime $expire_date
 * @property \Cake\I18n\FrozenTime $generated_date
 * @property int $payer_idx
 * @property string $payer_name
 * @property string $payer_mobile
 * @property string $payer_email
 * @property int $has_reminder
 * @property string $control_number
 */
class Bill extends Entity
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
        'reference' => true,
        'amount' => true,
        'equivalent_amount' => true,
        'misc_amount' => true,
        'expire_date' => true,
        'generated_date' => true,
        'payer_idx' => true,
        'payer_name' => true,
        'payer_mobile' => true,
        'payer_email' => true,
        'has_reminder' => true,
        'control_number' => true
    ];
}
