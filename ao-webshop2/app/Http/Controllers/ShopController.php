<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = null;

        if (!empty($_GET)) {
            $products = Category::find($_GET['category'])->products;
        } else {
            $products = Product::all();
        }

        return view('shop.index', [
            'categories' => $categories,
            'products' => $products,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $id
     * @return \Illuminate\Http\Response
     */
    public function product(Product $id)
    {
        if ($id == null){
            return redirect()->route('product.index');
        } else {
            return view('admin.product.show',['product'=>$id]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        $cart = new Cart($request);
        $cart->get();
     
        if ($cart->totalAmount != 0) {
            return view('shop.cart',[
                'cart'=>$cart
            ]);
        }
        return redirect()->route('shop.index');
    }

    /**
     * Display a listing of the resource.
     * 
     * @param \App\Models\Product $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request,Product $id)
    {
        $cart = new Cart($request);
        $cart->update($id,(int) $request->amount);

        if ($request->session()->has('cart')) {
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('shop.index');
        }
    }

    
    /**
     * add product(s) to cart
     *
     * @param \App\Models\Product $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request,Product $id)
    {
        $amount = (int)$request->amount;
        $cart = new Cart($request);
        $cart->add($id, $amount);

        return redirect()->route('shop.index');
    }

    /**
     * delete product from cart
     *
     * @param \App\Models\Product $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteFromCart(Request $request,Product $id)
    {
        $cart = new Cart($request);
        $cart->remove($id);

        if ($request->session()->has('cart')) {
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('shop.index');
        }
    }
}
