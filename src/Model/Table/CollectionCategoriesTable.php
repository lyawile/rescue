<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionCategories Model
 *
 * @method \App\Model\Entity\CollectionCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CollectionCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class CollectionCategoriesTable extends Table
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

        $this->setTable('collection_categories');
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
            ->scalar('name')
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('gsfcode')
            ->maxLength('gsfcode', 45)
            ->requirePresence('gsfcode', 'create')
            ->notEmpty('gsfcode');

        $validator
            ->scalar('detail')
            ->maxLength('detail', 45)
            ->allowEmpty('detail');

        return $validator;
    }
}
