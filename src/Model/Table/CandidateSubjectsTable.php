<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateSubjects Model
 *
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\BelongsTo $Candidates
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\CandidateSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateSubject|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidateSubjectsTable extends Table
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

        $this->setTable('candidate_subjects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidates_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subjects', [
            'foreignKey' => 'subjects_id',
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
        $rules->add($rules->existsIn(['subjects_id'], 'Subjects'));

        return $rules;
    }
}
