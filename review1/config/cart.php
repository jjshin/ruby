<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalWeight = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart['items'];
            $this->totalQty = $oldCart['totalQty'];
            $this->totalPrice = $oldCart['totalPrice'];
            $this->totalWeight = $oldCart['totalWeight'];
        }

    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'weight' => $item->weight];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $storedItem['weight'] = $item->weight * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->totalWeight += $item->weight;
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->items[$id]['weight'] -= $this->items[$id]['item']['weight'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        $this->totalWeight -= $this->items[$id]['item']['weight'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        $this->totalWeight -= $this->items[$id]['weight'];
        unset($this->items[$id]);
    }
}

