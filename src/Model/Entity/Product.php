<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $descript
 * @property bool $ship
 * @property int $qty
 * @property float $price
 * @property string $image
 * @property int $subcategory_id
 * @property int $suppliers_id
 * @property int $brands_id
 * @property int $status
 * @property int $sku
 * @property string $short_desc
 * @property string $long_desc
 * @property float $retail_price
 * @property float $cost_price
 * @property float $sale_price
 * @property string $size
 * @property string $sizeunit
 * @property string $weight
 * @property string $weightunit
 * @property string $height
 * @property string $heightunit
 * @property string $width
 * @property string $widthunit
 * @property string $length
 * @property string $lengthunit
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property string $image5
 * @property \Cake\I18n\Time $created
 */
class Product extends Entity
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
