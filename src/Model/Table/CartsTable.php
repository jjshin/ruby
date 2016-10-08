<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CartsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('carts');
        $this->primaryKey(['id']);
        $this->addBehavior('Timestamp');
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
            ->requirePresence(['users_id', 'products_id'], 'create')
            ->notEmpty(['users_id', 'products_id']);

        return $validator;
    }

}
