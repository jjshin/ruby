<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserShippingFixture
 *
 */
class UserShippingFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_shipping';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipping_streetno' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'shipping_street' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'shipping_suburb' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'shipping_state' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'shipping_pcode' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipping_country_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_shipping_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_shipping1_country_id' => ['type' => 'index', 'columns' => ['shipping_country_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_shipping1_country_id' => ['type' => 'foreign', 'columns' => ['shipping_country_id'], 'references' => ['countries', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_shipping_country_id' => ['type' => 'foreign', 'columns' => ['shipping_country_id'], 'references' => ['countries', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_shipping_user_id' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'shipping_streetno' => 'Lorem ipsum dolor sit amet',
            'shipping_street' => 'Lorem ipsum dolor sit amet',
            'shipping_suburb' => 'Lorem ipsum dolor sit amet',
            'shipping_state' => 'Lorem ipsum dolor sit amet',
            'shipping_pcode' => 1,
            'shipping_country_id' => 1
        ],
    ];
}
