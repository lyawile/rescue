<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BillItems Model
 *
 * @property \App\Model\Table\CollectionsTable|\Cake\ORM\Association\BelongsTo $Collections
 * @property \App\Model\Table\BillsTable|\Cake\ORM\Association\BelongsTo $Bills
 * @property \App\Model\Table\BillItemCandidatesTable|\Cake\ORM\Association\HasMany $BillItemCandidates
 *
 * @method \App\Model\Entity\BillItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\BillItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BillItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BillItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BillItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BillItem findOrCreate($search, callable $callback = null, $options = [])
 */
class BillItemsTable extends Table
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

        $this->setTable('bill_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Collections', [
            'foreignKey' => 'collection_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Bills', [
            'foreignKey' => 'bill_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BillItemCandidates', [
            'foreignKey' => 'bill_item_id'
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
            ->scalar('detail')
            ->maxLength('detail', 45)
            ->allowEmpty('detail');

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
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 45)
            ->requirePresence('unit', 'create')
            ->notEmpty('unit');

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
        $rules->add($rules->existsIn(['collection_id'], 'Collections'));
        $rules->add($rules->existsIn(['bill_id'], 'Bills'));

        return $rules;
    }
}
