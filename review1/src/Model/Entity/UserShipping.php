<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserShipping Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $shipping_address1
 * @property string $shipping_address2
 * @property string $shipping_suburb
 * @property string $shipping_state
 * @property int $shipping_pcode
 * @property int $shipping_country_id
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Order[] $orders
 */
class UserShipping extends Entity
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
        'id' => false,
    ];
}
