<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('firstname', 'create')
            ->add('firstname', 'firstname',['rule' => 'alphaNumeric', 'message' => 'Alphanumeric characters only'])
            ->notEmpty('firstname','Please enter your first name');

        $validator
            ->requirePresence('lastname', 'create')
            ->add('lastname', 'lastname',['rule' => 'alphaNumeric', 'message' => 'Alphanumeric characters only'])
            ->notEmpty('lastname','Please enter your last name');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password','Please enter your password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->add('email', 'email',['rule' => 'email', 'message' => 'Please enter a valid email address'])
            ->notEmpty('email');

        $validator
            ->integer('phone','Phone number can only be 10 digital number')
           // ->requirePresence('phone', 'create')
            ->allowEmpty('phone')
            ->add('phone', 'minlength', ['rule' => ['minLength', 10],
                'message' => 'Please enter a vaild Australian phone number']);


        $validator
            ->allowEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            // ->add('suburb', 'suburb',['rule' => 'alphaNumeric', 'message' => 'Alphanumeric characters only'])
            ->allowEmpty('suburb','Please enter your suburb');

        $validator
            ->allowEmpty('state');

        $validator
            ->integer('postcode','Posctcode can only be integer')
            ->allowEmpty('postcode')
        ->add('postcode', 'minlength', ['rule' => ['minLength', 4],
        'message' => 'Please enter a vaild Australian postcode'])
        ->add('postcode', 'maxlength', ['rule' => ['maxLength', 4],
            'message' => 'Please enter a vaild Australian postcode']);


        $validator
            ->integer('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->allowEmpty('country');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->allowEmpty('gender');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
