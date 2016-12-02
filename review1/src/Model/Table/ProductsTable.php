<?php
namespace App\Model\Table;

use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


/**
 * Products Model
 *
 * @property \Cake\ORM\Association\HasMany $Lineitems
 * @property \Cake\ORM\Association\BelongsToMany $Categories
 *
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
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'image' => [
                'transformer' => 'Josegonzalez\Upload\File\Transformer\DefaultTransformer',
                'path' => 'webroot/img/images',
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'image_dir', // defaults to `dir`
                    'size' => 'image_size', // defaults to `size`
                    'type' => 'image_type', // defaults to `type`
                ],
            ],
        ]);

        $this->hasMany('Lineitems', [
            'foreignKey' => 'product_id'
        ]);

        $this->hasMany('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('Brands',[
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'products_categories',
            //cascading delete. If you try to delete a product, it will also
            //remove the dependency in the products_categories table
            'dependent' => true
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'Restrictedproducts',
            //cascading delete. If you try to delete a restricted product, it will also
            //remove the dependency in the restrictedproducts table
            'dependent' => true
        ]);

        $this->belongsToMany('Orders', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'Lineitems',
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
            ->allowEmpty('desc');

        $validator
            ->numeric('price')
            ->allowEmpty('price');

        $validator
            ->integer('qty')
            ->allowEmpty('qty');

        $validator
            ->integer('weight')
            ->allowEmpty('weight');

        $validator
            ->boolean('restricted')
            ->allowEmpty('restricted');

        $validator
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));
        return $rules;
    }

    public function findCategories(Query $query, array $options){
        return $this->find()
            ->distinct(['Products.id'])
            ->order(['Products.brand_id'])
            ->matching('Categories', function ($q) use ($options) {
            return $q->where(['Categories.name IN' => $options['categories']]);
        });
    }

    public function findBrands(Query $query, array $options){
        return $this->find()
            ->distinct(['Products.id'])
            ->order(['Products.brand_id'])
            ->matching('Brands', function ($q) use ($options) {
                return $q->where(['Brands.name IN' => $options['brands']]);
            });
    }

}


