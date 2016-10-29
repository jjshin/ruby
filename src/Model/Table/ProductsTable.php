<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Subcategory
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $Brands
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->table('products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Subcategory', [
            'foreignKey' => 'subcategory_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'suppliers_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Brands', [
            'foreignKey' => 'brands_id',
            'joinType' => 'INNER'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('qty')
            ->allowEmpty('qty');

        $validator
            ->allowEmpty('image');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('sku')
            ->requirePresence('sku', 'create')
            ->notEmpty('sku');

        $validator
            ->allowEmpty('short_desc');

        $validator
            ->allowEmpty('long_desc');

        $validator
            ->decimal('retail_price')
            ->allowEmpty('retail_price');

        $validator
            ->decimal('cost_price')
            ->allowEmpty('cost_price');

        $validator
            ->decimal('sale_price')
            ->allowEmpty('sale_price');

        $validator
            ->allowEmpty('size');

        $validator
            ->allowEmpty('sizeunit');

        $validator
            ->allowEmpty('weight');

        $validator
            ->allowEmpty('weightunit');

        $validator
            ->allowEmpty('height');

        $validator
            ->allowEmpty('heightunit');

        $validator
            ->allowEmpty('width');

        $validator
            ->allowEmpty('widthunit');

        $validator
            ->allowEmpty('length');

        $validator
            ->allowEmpty('lengthunit');

        $validator
            ->allowEmpty('image2');

        $validator
            ->allowEmpty('image3');

        $validator
            ->allowEmpty('image4');

        $validator
            ->allowEmpty('image5');

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
        $rules->add($rules->existsIn(['subcategory_id'], 'Subcategory'));
        $rules->add($rules->existsIn(['suppliers_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['brands_id'], 'Brands'));

        return $rules;
    }
}
