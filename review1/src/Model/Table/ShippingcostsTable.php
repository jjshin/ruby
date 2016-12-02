<?php
/**
 * Created by PhpStorm.
 * User: Vuilniss
 * Date: 3/10/2016
 * Time: 7:35 PM
 */

namespace App\Model\Table;

use App\Model\Entity\Shippingcost;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shippingcosts Model
 *
 * @property \Cake\ORM\Association\HasMany $Products
 */
class ShippingcostsTable extends Table
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

        $this->table('shippingcosts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->hasMany('Products', [
//            'foreignKey' => 'brand_id'
//        ]);
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
            ->integer('from_weight')
            ->allowEmpty('from_weight');

        $validator
            ->integer('to_weight')
            ->allowEmpty('to_weight');

        $validator
            ->numeric('price')
            ->allowEmpty('price');

        return $validator;
    }
}
