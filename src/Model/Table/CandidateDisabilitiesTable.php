<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateDisabilities Model
 *
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\BelongsTo $Candidates
 * @property \App\Model\Table\DisabilitiesTable|\Cake\ORM\Association\BelongsTo $Disabilities
 *
 * @method \App\Model\Entity\CandidateDisability get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateDisability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateDisability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDisability|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateDisability|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateDisability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDisability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDisability findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidateDisabilitiesTable extends Table
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

        $this->setTable('candidate_disabilities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Disabilities', [
            'foreignKey' => 'disability_id',
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
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));
        $rules->add($rules->existsIn(['disability_id'], 'Disabilities'));

        return $rules;
    }
}
