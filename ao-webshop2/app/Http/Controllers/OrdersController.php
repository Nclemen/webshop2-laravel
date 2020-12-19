<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {   
        if ($request->session()->get('cart')) {
            $user = Auth::user(); 
            $cart = $request->session()->get('cart');

            Order::create([
                'cart' => serialize($cart),
                'user_id' => $user->id,
            ]);

            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.index');
        }
        $request->session()->forget('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $order = Order::find($id);

        if ($order == null){
            return redirect()->route('category.index');
        } else {
            return view('admin.order.show',['order'=>$order]);
        }
    }

}
