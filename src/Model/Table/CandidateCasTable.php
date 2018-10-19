<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateCas Model
 *
 * @property \App\Model\Table\CandidateSubjectsTable|\Cake\ORM\Association\BelongsTo $CandidateSubjects
 *
 * @method \App\Model\Entity\CandidateCa get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateCa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateCa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateCa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateCa|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateCa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateCa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateCa findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidateCasTable extends Table
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

        $this->setTable('candidate_cas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CandidateSubjects', [
            'foreignKey' => 'candidate_subject_id'
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
            ->scalar('ftwo_centreno')
            ->maxLength('ftwo_centreno', 32)
            ->allowEmpty('ftwo_centreno');

        $validator
            ->scalar('ftwo_candidateno')
            ->maxLength('ftwo_candidateno', 32)
            ->allowEmpty('ftwo_candidateno');

        $validator
            ->scalar('ftwo_year')
            ->maxLength('ftwo_year', 32)
            ->allowEmpty('ftwo_year');

        $validator
            ->decimal('y1t1')
            ->allowEmpty('y1t1');

        $validator
            ->decimal('y1t2')
            ->allowEmpty('y1t2');

        $validator
            ->decimal('y2t1')
            ->allowEmpty('y2t1');

        $validator
            ->decimal('project')
            ->allowEmpty('project');

        $validator
            ->scalar('btp')
            ->maxLength('btp', 32)
            ->allowEmpty('btp');

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
        $rules->add($rules->existsIn(['candidate_subject_id'], 'CandidateSubjects'));

        return $rules;
    }
}
