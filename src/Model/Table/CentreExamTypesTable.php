<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CentreExamTypes Model
 *
 * @property \App\Model\Table\ExamTypesTable|\Cake\ORM\Association\BelongsTo $ExamTypes
 * @property \App\Model\Table\CentresTable|\Cake\ORM\Association\BelongsTo $Centres
 *
 * @method \App\Model\Entity\CentreExamType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CentreExamType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CentreExamType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CentreExamType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentreExamType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentreExamType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CentreExamType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CentreExamType findOrCreate($search, callable $callback = null, $options = [])
 */
class CentreExamTypesTable extends Table
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

        $this->setTable('centre_exam_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExamTypes', [
            'foreignKey' => 'exam_type_id',
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
        $rules->add($rules->existsIn(['exam_type_id'], 'ExamTypes'));
        $rules->add($rules->existsIn(['centre_id'], 'Centres'));

        return $rules;
    }
}
