<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property |\Cake\ORM\Association\HasMany $GroupDistrictRegionSchoolUsers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->addBehavior('Acl.Acl', ['type' => 'requester']);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('GroupDistrictRegionSchoolUsers', [
            'foreignKey' => 'user_id'
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
            ->scalar('first_name')
            ->maxLength('first_name', 45)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('other_name')
            ->maxLength('other_name', 45)
            ->allowEmpty('other_name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 45)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->scalar('username')
            ->maxLength('username', 45)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 256)
            ->minLength('password', 5, 'Password must be atleast 5 characters long')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 45)
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');

        return $validator;
    }

    public function validationPassword(Validator $validator)
    {
        $validator->add('old_password', 'custom', [
                'rule' => function ($value, $context) {
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message' => 'The old password is not correct!',
            ])
            ->notEmpty('old_password');

        $validator
            ->add('password1', [
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'Password must be atleast 5 characters long',
                ]
            ])
            ->add('password1', [
                'match' => [
                    'rule' => ['compareWith', 'password2'],
                    'message' => 'Passwords doesnt match',
                ]
            ])
            ->notEmpty('password1');

        $validator->add('password2', [
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'Password must be atleast 5 characters long',
                ]
            ])
            ->add('password2', [
                'match' => [
                    'rule' => ['compareWith', 'password1'],
                    'message' => 'Passwords doesnt match',
                ]
            ])
            ->notEmpty('password2');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }
}
