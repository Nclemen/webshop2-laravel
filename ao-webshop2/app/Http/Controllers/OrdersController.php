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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Schema::getColumnListing('orders');

        unset(
            $headers[array_search('cart',$headers)],
        );
        
        $orders = Order::all();
        
        return view('admin.order.index', [
            'orders' => $orders,
            'headers' => $headers,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        if ($order == null){
            return redirect()->route('order.index');
        } else {
            return view('admin.order.edit', ['order' => $order]);
        }

    }

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

        }
        $request->session()->forget('cart');

        return redirect()->route('shop.index');
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

        if ($order !== null && Auth::user()->id == $order->user_id || Auth::user()->is_admin){
            return view('admin.order.show',[
                'order'=>$order,
                'cart'=>unserialize($order->cart),
                ]);
        }

        return redirect()->route('main.index');
    }

}
