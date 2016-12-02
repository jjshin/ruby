<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\HasMany $Products
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $UserShipping
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

        $this->addBehavior('Timestamp');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserShipping', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsToMany('Products', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'Restrictedproducts',
            //cascading delete. If you try to delete a restricted product, it will also
            //remove the dependency in the 
            'dependent' => true
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->notEmpty('fname');

        $validator
            ->notEmpty('lname');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->allowEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            ->allowEmpty('suburb');

        $validator
            ->allowEmpty('state');

        $validator
            ->integer('pcode')
            ->allowEmpty('pcode');

        $validator
            ->notEmpty('contactno');

        $validator
            ->allowEmpty('user_type');

        $validator
            ->allowEmpty('notes');

        $validator
            ->boolean('subscribe')
            ->allowEmpty('subscribe');


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
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        return $rules;
    }

//    public function findProducts(Query $query, array $options){
//        return $this->find('all')
//            ->distinct(['Products.id'])
//            ->where(['restricted'=>'1'])
//            ->matching('Users', function ($q) use ($options) {
//                return $q->where(['User.name IN' => $options['user']]);
//            });
//    }
    
    public function validationPassword(Validator $validator ) {
        $validator
            ->add('old_password','custom',[
                'rule'=> function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message'=>'The old password does not match the current password!', ])
            ->notEmpty('old_password');

        $validator
            ->add('password1', [ '
            length' => [
                'rule' => ['minLength', 6],
                'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->add('password1',[
                'match'=>[
                    'rule'=> ['compareWith','password2'],
                    'message'=>'The passwords do not match',
                ]
            ])
            ->notEmpty('password1');

        $validator
            ->add('password2', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->add('password2',[
                'match'=>[
                    'rule'=> ['compareWith','password1'],
                    'message'=>'The passwords do not match',
                ]
            ])
            ->notEmpty('password2');

        return $validator; }
}

