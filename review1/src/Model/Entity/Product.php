<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * Product Entity.
 *
 * @property int $id
 * @property string $desc
 * @property float $price
 * @property int $qty
 * @property string $name
 * @property int $category_id
 * @property int $brand_id
  * @property string $image
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Lineitem[] $lineitems
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
        'id' => false,
    ];
    
    public function hasLowStock(){
        if($this->outOfStock()){
            return false;
        }

        return (bool)($this->qty <= 5);
    }
    public function outOfStock(){

        return $this->qty === 0;
    }
    public function inStock(){
        return $this->qty >= 1;
    }
    public function hasStock($quantity){
        return $this->qty >= $quantity;
    }
    public function isRestricted (){
        if ($this->restricted) {
            return true;
        }
    }
    
}
