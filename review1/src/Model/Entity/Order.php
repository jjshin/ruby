<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property string $type
 * @property int $id
 * @property \Cake\I18n\Time $date
 * @property int $user_id
 * @property float $total
 * @property string $status
 * @property float $discount
 * @property string $transaction_no
 * @property float $shipping
 * @property int $deliveries_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Transaction $transaction
 * @property \App\Model\Entity\Delivery $delivery
 * @property \App\Model\Entity\Lineitem[] $lineitems
 */
class Order extends Entity
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
