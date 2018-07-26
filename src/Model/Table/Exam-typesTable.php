<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exam-types Model
 *
 * @method \App\Model\Entity\Exam-type get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exam-type newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exam-type[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exam-type|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exam-type|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exam-type patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exam-type[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exam-type findOrCreate($search, callable $callback = null, $options = [])
 */
class Exam-typesTable extends Table
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

        $this->setTable('exam_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('short_name')
            ->maxLength('short_name', 8)
            ->requirePresence('short_name', 'create')
            ->notEmpty('short_name');

        return $validator;
    }
}
