<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
<<<<<<< HEAD
=======
 * @property |\Cake\ORM\Association\HasMany $GroupDistrictRegionSchoolUsers
 * @property |\Cake\ORM\Association\HasMany $Users
 *
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
 * @method \App\Model\Entity\Group get($primaryKey, $options = [])
 * @method \App\Model\Entity\Group newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Group|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Group[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Group findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupsTable extends Table
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

<<<<<<< HEAD
        $this->setTable('groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
=======
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);

        $this->setTable('groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('GroupDistrictRegionSchoolUsers', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'group_id'
        ]);
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
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
            ->allowEmpty('name');

        return $validator;
    }
}
