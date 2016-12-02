<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $fname
 * @property string $lname
 * @property \Cake\I18n\Time $dob
 * @property int $address1
 * @property string $address2
 * @property string $suburb
 * @property string $state
 * @property int $pcode
 * @property string $contactno
 * @property string $user_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $country_id
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\UserShipping[] $user_shipping
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password){
  return (new DefaultPasswordHasher)->hash($password);
}
}
