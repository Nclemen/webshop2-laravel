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

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = Auth::user();

        $orders = Order::all();

        $headers = Schema::getColumnListing('orders');

        unset(
            $headers[array_search('cart',$headers)],
            $headers[array_search('updated_at',$headers)]
        );

        return view('profile.index',[
            'user' => $user,
            'orders' => $orders,
            'headers' => $headers,
        ]);
    }

}
