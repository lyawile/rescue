<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disabilities Model
 *
 * @property \App\Model\Table\CandidateDisabilitiesTable|\Cake\ORM\Association\HasMany $CandidateDisabilities
 *
 * @method \App\Model\Entity\Disability get($primaryKey, $options = [])
 * @method \App\Model\Entity\Disability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Disability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disability|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disability|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Disability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disability findOrCreate($search, callable $callback = null, $options = [])
 */
class DisabilitiesTable extends Table
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

        $this->setTable('disabilities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CandidateDisabilities', [
            'foreignKey' => 'disability_id'
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('shortname')
            ->maxLength('shortname', 45)
            ->requirePresence('shortname', 'create')
            ->notEmpty('shortname');

        $validator
            ->scalar('details')
            ->maxLength('details', 45)
            ->allowEmpty('details');

        return $validator;
    }
}
