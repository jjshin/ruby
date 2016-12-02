<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property string $email
 * @property int $phone
 * @property string $address1
 * @property string $address2
 * @property string $suburb
 * @property string $state
 * @property string $postcode
 * @property bool $subscribe
 * @property int $role
 * @property string $country
 * @property \Cake\I18n\Time $dob
 * @property string $gender
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
        'id' => false
    ];

    protected function _setPassword($password)
      {
          return (new DefaultPasswordHasher)->hash($password);
      }
    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
