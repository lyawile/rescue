<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Practicals Model
 *
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\BelongsTo $Subjects
 * @property \App\Model\Table\CentresTable|\Cake\ORM\Association\BelongsTo $Centres
 *
 * @method \App\Model\Entity\Practical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Practical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Practical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Practical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practical|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Practical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Practical findOrCreate($search, callable $callback = null, $options = [])
 */
class PracticalsTable extends Table
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

        $this->setTable('practicals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Centres', [
            'foreignKey' => 'centre_id',
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
            ->integer('practical_type')
            ->requirePresence('practical_type', 'create')
            ->notEmpty('practical_type');

        $validator
            ->integer('group_A')
            ->requirePresence('group_A', 'create')
            ->notEmpty('group_A');

        $validator
            ->integer('group_B')
            ->allowEmpty('group_B');

        $validator
            ->integer('group_C')
            ->allowEmpty('group_C');

        $validator
            ->integer('total')
            ->allowEmpty('total');

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
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));
        $rules->add($rules->existsIn(['centre_id'], 'Centres'));

        return $rules;
    }
}
