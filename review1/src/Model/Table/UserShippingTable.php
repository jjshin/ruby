<?php
namespace App\Model\Table;

use App\Model\Entity\UserShipping;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserShipping Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\HasMany $Orders
 */
class UserShippingTable extends Table
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

        $this->table('user_shipping');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'shipping_country_id'
        ]);
//        $this->hasMany('Orders', [
//            'foreignKey' => 'user_shipping_id'
//       ]);
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
            ->allowEmpty('shipping_address1');

        $validator
            ->allowEmpty('shipping_address2');

        $validator
            ->allowEmpty('shipping_suburb');

        $validator
            ->allowEmpty('shipping_state');

        $validator
            ->integer('shipping_pcode')
            ->allowEmpty('shipping_pcode');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['shipping_country_id'], 'Countries'));
        return $rules;
    }
}
