<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string $transaction_idx
 * @property float $transaction_date
 * @property string $gepg_receipt
 * @property string $control_number
 * @property float $bill_amount
 * @property float $paid_amount
 * @property string $bill_payment_option
 * @property string $currency
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $payment_channel
 * @property string $payer_mobile
 * @property string $payer_email
 * @property string $provider_receipt
 * @property string $provider_name
 * @property string $credited_account
 * @property int $bill_id
 * @property int $is_consumed
 *
 * @property \App\Model\Entity\Bill $bill
 * @property \App\Model\Entity\PaymentReconciliation[] $payment_reconciliations
 */
class Payment extends Entity
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
        'transaction_idx' => true,
        'transaction_date' => true,
        'gepg_receipt' => true,
        'control_number' => true,
        'bill_amount' => true,
        'paid_amount' => true,
        'bill_payment_option' => true,
        'currency' => true,
        'created' => true,
        'modified' => true,
        'payment_channel' => true,
        'payer_mobile' => true,
        'payer_email' => true,
        'provider_receipt' => true,
        'provider_name' => true,
        'credited_account' => true,
        'bill_id' => true,
        'is_consumed' => true,
        'bill' => true,
        'payment_reconciliations' => true
    ];
}
