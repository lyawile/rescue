<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DisqualifiedCandidateSubjects Model
 *
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\BelongsTo $Subjects
 * @property \App\Model\Table\DisqualifiedCandidatesTable|\Cake\ORM\Association\BelongsTo $DisqualifiedCandidates
 *
 * @method \App\Model\Entity\DisqualifiedCandidateSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DisqualifiedCandidateSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class DisqualifiedCandidateSubjectsTable extends Table
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

        $this->setTable('disqualified_candidate_subjects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subjects_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DisqualifiedCandidates', [
            'foreignKey' => 'disqualified_candidates_id',
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
        $rules->add($rules->existsIn(['subjects_id'], 'Subjects'));
        $rules->add($rules->existsIn(['disqualified_candidates_id'], 'DisqualifiedCandidates'));

        return $rules;
    }
}
