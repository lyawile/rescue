<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateQualifications Model
 *
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\BelongsTo $Candidates
 *
 * @method \App\Model\Entity\CandidateQualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateQualification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateQualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateQualification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateQualification|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateQualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateQualification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateQualification findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidateQualificationsTable extends Table
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

        $this->setTable('candidate_qualifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidates_id',
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
            ->scalar('centre_number')
            ->maxLength('centre_number', 8)
            ->requirePresence('centre_number', 'create')
            ->notEmpty('centre_number');

        $validator
            ->scalar('candidate_number')
            ->maxLength('candidate_number', 8)
            ->requirePresence('candidate_number', 'create')
            ->notEmpty('candidate_number');

        $validator
            ->integer('exam_year')
            ->requirePresence('exam_year', 'create')
            ->notEmpty('exam_year');

        $validator
            ->integer('experience')
            ->allowEmpty('experience');

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
        $rules->add($rules->existsIn(['candidates_id'], 'Candidates'));

        return $rules;
    }
}
