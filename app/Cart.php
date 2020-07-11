<?php

namespace App;


class Cart
{
   public $items = null;
   public $totalPrice = 0;
   public $totalQuatity = 0;

   public function __construct($oldCart)
   {
    if($oldCart)
    {
        $this->items = $oldCart->items;
        $this->totalPrice = $oldCart->totalPrice;
        $this->totalQuatity = $oldCart->totalQuatity;
    }
   }




   public function add($item, $id)
   {
       $storedCart = ['qty' => 0, 'price' => $item->prix, 'item' => $item];
       if($this->items){
           if(array_key_exists($id,$this->items)){
               $storedCart = $this->items[$id];
            }
       }

       $storedCart['qty'] += 1;
       $storedCart['price'] = $item->prix * $storedCart['qty'];
       $this->items[$id] = $storedCart;

       $this->totalQuatity++;
       $this->totalPrice += $item->prix;
    }

    public function delete($id)
    {
        if($this->items[$id]['qty'] != 0 ) {
            $this->items[$id]['qty'] -= 1;
            $this->totalQuatity--;
        }
        else{
        $this->items[$id]['qty'] = 0;
    }
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalPrice = $this->totalPrice - $this->items[$id]['item']['price'];
    }

}


