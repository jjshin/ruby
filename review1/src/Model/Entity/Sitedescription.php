<?php
/**
 * Created by PhpStorm.
 * User: Vuilniss
 * Date: 25/09/2016
 * Time: 12:20 PM
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sitedescription Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Product[] $products
 */
class Sitedescription extends Entity
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
