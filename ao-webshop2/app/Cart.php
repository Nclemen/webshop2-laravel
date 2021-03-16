<?php

namespace App;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class Cart
{
    /**
     * items in cart
     *
     * @var array
     */
    public $items = null;

    /**
     * total amount of items in cart
     *
     * @var int
     */
    public $totalAmount = 0;

    /**
     * total price for the items in cart combined
     *
     * @var int
     */
    public $totalPrice = 0;

    private $session;

    /**
     * cart constructor
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    function __construct($request)
    {
        $session = $request->session();
        $oldCart = $session->has('cart') ? $oldCart = $session->get('cart') : null;

        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalAmount = $oldCart->totalAmount;
            $this->totalPrice = $oldCart->totalPrice;
        }
        
    }

    /**
     * get item to cart
     *
     */
    public function get(){
        return $this;
    }

    /**
     * add item to cart
     *
     * @param App\Models\Product $item
     * @param int $amount
     */
    public function add($item,int $amount){
        $newItem = ['amount' => $amount, 'price' => $item->price, 'combinedPrice' => floatval($item->price) * $amount, 'item' => $item];
            if ($this->items && array_key_exists($item->id, $this->items)) {
                $newItem = $this->items[ $item->id];
                $newItem['amount'] += $amount;
                $newItem['combinedPrice'] += $item->price * $amount;
            }
        $this->items[$item->id] =  $newItem ;
        $this->totalAmount +=  $amount ;
        $this->totalPrice +=  $newItem['combinedPrice'];

        $this->session->put('cart', $this);
    }

    /**
     * update amount of item in cart
     *
     * @param App\Models\Product $item
     * @param int $amount
     */
    public function update(Product $item,int $amount){
        $amount = (int)$amount;
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

        if ($this->totalAmount == 0) {
            $this->session->forget('cart');
        } else {
            $this->session->put('cart', $this);
        }
    }

    /**
     * remove item from cart
     *
     * @param App\Models\Product $item
     */
    public function remove($item){
        $this->totalPrice = (int)bcsub($this->totalPrice ,$this->items[$item->id]['combinedPrice'], 2);
        $this->totalAmount -=  $this->items[$item->id]['amount'] ;
        unset($this->items[$item->id]);
            
        if ($this->totalAmount == 0) {
            $this->session->forget('cart');
        } else {
            $this->session->put('cart', $this);
        }
    }
}
