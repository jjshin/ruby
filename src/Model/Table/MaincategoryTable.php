<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maincategory Model
 *
 * @property \Cake\ORM\Association\HasMany $Category
 *
 * @method \App\Model\Entity\Maincategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maincategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Maincategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maincategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maincategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maincategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maincategory findOrCreate($search, callable $callback = null)
 */
class MaincategoryTable extends Table
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

        $this->table('maincategory');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Category', [
            'foreignKey' => 'maincategory_id'
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

        return $validator;
    }
}
