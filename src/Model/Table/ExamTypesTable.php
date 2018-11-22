<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamTypes Model
 *
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\HasMany $Candidates
 * @property \App\Model\Table\CentreExamTypesTable|\Cake\ORM\Association\HasMany $CentreExamTypes
 * @property \App\Model\Table\CollectionsTable|\Cake\ORM\Association\HasMany $Collections
 * @property \App\Model\Table\DisqualifiedCandidatesTable|\Cake\ORM\Association\HasMany $DisqualifiedCandidates
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\HasMany $Subjects
 *
 * @method \App\Model\Entity\ExamType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExamType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamType findOrCreate($search, callable $callback = null, $options = [])
 */
class ExamTypesTable extends Table
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

        $this->hasMany('Candidates', [
            'foreignKey' => 'exam_type_id'
        ]);
        $this->hasMany('CentreExamTypes', [
            'foreignKey' => 'exam_type_id'
        ]);
        $this->hasMany('Collections', [
            'foreignKey' => 'exam_type_id'
        ]);
        $this->hasMany('DisqualifiedCandidates', [
            'foreignKey' => 'exam_type_id'
        ]);
        $this->hasMany('Subjects', [
            'foreignKey' => 'exam_type_id'
        ]);
        $this->belongsToMany('Centres', [
            'foreignKey' => 'exam_type_id',
            'targetForeignKey' => 'centre_id',
            'joinTable' => 'centre_exam_types'
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
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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

        $validator
            ->requirePresence('has_ca', 'create')
            ->notEmpty('has_ca');

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
        $rules->add($rules->isUnique(['code']));

        return $rules;
    }

    public function findExamTypesByCentre($centreId){
        $query = $this->find()->contain('Centres', function ($q) use ($centreId) {
            return $q
//                ->select(['body', 'author_id'])
                ->where(['Centres.id' => $centreId]);
        });

        return $query;
    }
}
