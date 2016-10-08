<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrderproductsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('orderproducts');
        $this->primaryKey(['id']);
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
            ->notEmpty('id', 'create');

        $validator
            ->requirePresence(['orderdetails_id', 'products_id'], 'create')
            ->notEmpty(['orderdetails_id', 'products_id']);

        return $validator;
    }

}
