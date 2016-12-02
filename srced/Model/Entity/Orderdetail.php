<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderdetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property int $users_id
 * @property int $order_status
 * @property float $order_total
 * @property string $receive_name
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $suburb
 * @property string $state
 * @property string $postcode
 */
class Orderdetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
