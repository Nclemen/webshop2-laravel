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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $product = Product::find($id);

        if ($product == null){
            return redirect()->route('product.index');
        } else {
            return view('admin.product.show',['product'=>$product]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        if ($request->session()->get('cart')) {
            $cart = $request->session()->get('cart');

            return view('shop.cart',[
                'cart'=>$cart
            ]);
        }
        return redirect()->route('shop.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request, $id)
    {
        $product = Product::find($id);

        $cart = new Cart($request);

        $cart->update($product, $request);

        if ($request->session()->has('cart')) {
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('shop.index');
        }
    }

    
    /**
     * add product(s) to cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart($request);

        $cart->add($product, (int)$request->amount,$request);

        return redirect()->route('shop.index');
    }

    /**
     * delete product from cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteFromCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart($request);

        $cart->remove($product,$request);

        if ($request->session()->has('cart')) {
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('shop.index');
        }
    }
}
