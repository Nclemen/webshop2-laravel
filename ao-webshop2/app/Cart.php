<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalAmount = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalAmount = $oldCart->totalAmount;
            $this->totalPrice = $oldCart->totalPrice;
        }
        
    }

    public function add($item,int $amount){
        $newItem = ['amount' => $amount, 'price' => $item->price, 'combinedPrice' => floatval($item->price) * $amount, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($item->id, $this->items)) {
                $newItem = $this->items[ $item->id];
                $newItem['amount'] += $amount;
                $newItem['combinedPrice'] += $item->price * $amount;
            }
        }  
        $this->items[$item->id] =  $newItem ;
        $this->totalAmount +=  $amount ;
        $this->totalPrice +=  $newItem['combinedPrice'] ;
    }

    public function update($item,int $amount){
        $newItem = ['amount' => $amount, 'price' => $item->price, 'combinedPrice' => floatval($item->price) * $amount, 'item' => $item];

        $this->totalPrice = floatval(bcsub($this->totalPrice ,$this->items[$item->id]['combinedPrice'], 2));
        $this->totalAmount -= $this->items[$item->id]['amount'] ;
        if ($amount !== 0) {
            $this->items[$item->id] =  $newItem ;
            $this->totalAmount +=  $amount ;
            $this->totalPrice +=  $newItem['combinedPrice'] ;
        } else {
            unset($this->items[$item->id]);
        }

    }

    public function remove($item){
            $this->totalPrice = (int)bcsub($this->totalPrice ,$this->items[$item->id]['combinedPrice'], 2);
            $this->totalAmount -=  $this->items[$item->id]['amount'] ;
            unset($this->items[$item->id]);
    }
}
