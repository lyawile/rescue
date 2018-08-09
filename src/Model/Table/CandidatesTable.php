<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidates Model
 *
 * @property \App\Model\Table\ExamTypesTable|\Cake\ORM\Association\BelongsTo $ExamTypes
 * @property \App\Model\Table\CentresTable|\Cake\ORM\Association\BelongsTo $Centres
 *
 * @method \App\Model\Entity\Candidate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidatesTable extends Table
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

        $this->setTable('candidates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExamTypes', [
            'foreignKey' => 'exam_types_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Centres', [
            'foreignKey' => 'centres_id',
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
            ->maxLength('number', 45)
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 64)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('other_name')
            ->maxLength('other_name', 64)
            ->requirePresence('other_name', 'create')
            ->notEmpty('other_name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 45)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->scalar('sex')
            ->maxLength('sex', 8)
            ->allowEmpty('sex');

        $validator
            ->integer('PSLE_number')
            ->allowEmpty('PSLE_number');

        $validator
            ->integer('PSLE_year')
            ->allowEmpty('PSLE_year');

        $validator
            ->scalar('ID_number')
            ->maxLength('ID_number', 8)
            ->allowEmpty('ID_number');

        $validator
            ->date('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->scalar('guardian_phone')
            ->maxLength('guardian_phone', 32)
            ->allowEmpty('guardian_phone');

        $validator
            ->integer('is_repeater')
            ->requirePresence('is_repeater', 'create')
            ->notEmpty('is_repeater');

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
        $rules->add($rules->existsIn(['exam_types_id'], 'ExamTypes'));
        $rules->add($rules->existsIn(['centres_id'], 'Centres'));

        return $rules;
    }
}
