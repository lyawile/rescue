<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bills Model
 *
 * @property \App\Model\Table\BillItemsTable|\Cake\ORM\Association\HasMany $BillItems
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Bill get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bill findOrCreate($search, callable $callback = null, $options = [])
 */
class BillsTable extends Table
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

        $this->setTable('bills');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('BillItems', [
            'foreignKey' => 'bill_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bill_id'
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
            ->scalar('reference')
            ->maxLength('reference', 64)
            ->allowEmpty('reference');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->decimal('equivalent_amount')
            ->requirePresence('equivalent_amount', 'create')
            ->notEmpty('equivalent_amount');

        $validator
            ->decimal('misc_amount')
            ->requirePresence('misc_amount', 'create')
            ->notEmpty('misc_amount');

        $validator
            ->dateTime('expire_date')
            ->requirePresence('expire_date', 'create')
            ->notEmpty('expire_date');

        $validator
            ->dateTime('generated_date')
            ->requirePresence('generated_date', 'create')
            ->notEmpty('generated_date');

        $validator
            ->integer('payer_idx')
            ->allowEmpty('payer_idx');

        $validator
            ->scalar('payer_name')
            ->maxLength('payer_name', 256)
            ->allowEmpty('payer_name');

        $validator
            ->scalar('payer_mobile')
            ->maxLength('payer_mobile', 182)
            ->requirePresence('payer_mobile', 'create')
            ->notEmpty('payer_mobile');

        $validator
            ->scalar('payer_email')
            ->maxLength('payer_email', 128)
            ->allowEmpty('payer_email');

        $validator
            ->integer('has_reminder')
            ->requirePresence('has_reminder', 'create')
            ->notEmpty('has_reminder');

        $validator
            ->scalar('control_number')
            ->maxLength('control_number', 256)
            ->allowEmpty('control_number');

        return $validator;
    }
}
