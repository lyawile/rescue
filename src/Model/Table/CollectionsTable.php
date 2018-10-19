<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Collections Model
 *
 * @property \App\Model\Table\ExamTypesTable|\Cake\ORM\Association\BelongsTo $ExamTypes
 * @property \App\Model\Table\CollectionCategoriesTable|\Cake\ORM\Association\BelongsTo $CollectionCategories
 * @property |\Cake\ORM\Association\HasMany $BillItems
 * @property |\Cake\ORM\Association\HasMany $Services
 *
 * @method \App\Model\Entity\Collection get($primaryKey, $options = [])
 * @method \App\Model\Entity\Collection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Collection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Collection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collection|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Collection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Collection findOrCreate($search, callable $callback = null, $options = [])
 */
class CollectionsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('collections');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExamTypes', [
            'foreignKey' => 'exam_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CollectionCategories', [
            'foreignKey' => 'collection_categorie_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BillItems', [
            'foreignKey' => 'collection_id'
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'collection_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('name')
                ->maxLength('name', 45)
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->scalar('description')
                ->maxLength('description', 45)
                ->allowEmpty('description');

        $validator
                ->dateTime('start_date')
                ->requirePresence('start_date', 'create')
                ->notEmpty('start_date');

        $validator
                ->dateTime('end_date')
                ->requirePresence('end_date', 'create')
                ->notEmpty('end_date');

        $validator
                ->decimal('ammount')
                ->requirePresence('ammount', 'create')
                ->notEmpty('ammount');
        $validator
                ->requirePresence('is_current', 'create')
                ->notEmpty('is_current');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['exam_type_id'], 'ExamTypes'));
        $rules->add($rules->existsIn(['collection_categorie_id'], 'CollectionCategories'));

        return $rules;
    }

}
