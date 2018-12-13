<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \App\Model\Table\BillsTable|\Cake\ORM\Association\BelongsTo $Bills
 * @property \App\Model\Table\PaymentReconciliationsTable|\Cake\ORM\Association\HasMany $PaymentReconciliations
 *
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Bills', [
            'foreignKey' => 'bill_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PaymentReconciliations', [
            'foreignKey' => 'payment_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('transaction_idx')
            ->maxLength('transaction_idx', 128)
            ->requirePresence('transaction_idx', 'create')
            ->notEmpty('transaction_idx');

        $validator
            ->decimal('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->notEmpty('transaction_date');

        $validator
            ->scalar('gepg_receipt')
            ->maxLength('gepg_receipt', 128)
            ->requirePresence('gepg_receipt', 'create')
            ->notEmpty('gepg_receipt');

        $validator
            ->scalar('control_number')
            ->maxLength('control_number', 128)
            ->requirePresence('control_number', 'create')
            ->notEmpty('control_number');

        $validator
            ->decimal('bill_amount')
            ->requirePresence('bill_amount', 'create')
            ->notEmpty('bill_amount');

        $validator
            ->decimal('paid_amount')
            ->requirePresence('paid_amount', 'create')
            ->notEmpty('paid_amount');

        $validator
            ->scalar('bill_payment_option')
            ->maxLength('bill_payment_option', 45)
            ->requirePresence('bill_payment_option', 'create')
            ->notEmpty('bill_payment_option');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 8)
            ->requirePresence('currency', 'create')
            ->notEmpty('currency');

        $validator
            ->scalar('payment_channel')
            ->maxLength('payment_channel', 45)
            ->requirePresence('payment_channel', 'create')
            ->notEmpty('payment_channel');

        $validator
            ->scalar('payer_mobile')
            ->maxLength('payer_mobile', 256)
            ->requirePresence('payer_mobile', 'create')
            ->notEmpty('payer_mobile');

        $validator
            ->scalar('payer_email')
            ->maxLength('payer_email', 256)
            ->requirePresence('payer_email', 'create')
            ->notEmpty('payer_email');

        $validator
            ->scalar('provider_receipt')
            ->maxLength('provider_receipt', 256)
            ->requirePresence('provider_receipt', 'create')
            ->notEmpty('provider_receipt');

        $validator
            ->scalar('provider_name')
            ->maxLength('provider_name', 256)
            ->requirePresence('provider_name', 'create')
            ->notEmpty('provider_name');

        $validator
            ->scalar('credited_account')
            ->maxLength('credited_account', 256)
            ->requirePresence('credited_account', 'create')
            ->notEmpty('credited_account');

        $validator
            ->integer('is_consumed')
            ->requirePresence('is_consumed', 'create')
            ->notEmpty('is_consumed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bill_id'], 'Bills'));

        return $rules;
    }
}
