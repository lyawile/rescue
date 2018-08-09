<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centres Model
 *
 * @property \App\Model\Table\DistrictsTable|\Cake\ORM\Association\BelongsTo $Districts
 *
 * @method \App\Model\Entity\Centre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centre|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centre findOrCreate($search, callable $callback = null, $options = [])
 */
class CentresTable extends Table
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

        $this->setTable('centres');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
            'joinType' => 'INNER'
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
            ->scalar('number')
            ->maxLength('number', 8)
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('ownership')
            ->maxLength('ownership', 45)
            ->allowEmpty('ownership');

        $validator
            ->scalar('detail')
            ->maxLength('detail', 45)
            ->allowEmpty('detail');

        $validator
            ->scalar('principal_name')
            ->maxLength('principal_name', 256)
            ->allowEmpty('principal_name');

        $validator
            ->scalar('principal_phone')
            ->maxLength('principal_phone', 64)
            ->allowEmpty('principal_phone');

        $validator
            ->scalar('contact_one')
            ->maxLength('contact_one', 64)
            ->allowEmpty('contact_one');

        $validator
            ->scalar('contact_two')
            ->maxLength('contact_two', 64)
            ->allowEmpty('contact_two');

        $validator
            ->decimal('district_distance')
            ->allowEmpty('district_distance');

        $validator
            ->scalar('centre_type')
            ->maxLength('centre_type', 45)
            ->allowEmpty('centre_type');

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
        $rules->add($rules->existsIn(['district_id'], 'Districts'));

        return $rules;
    }
}
