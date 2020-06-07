<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index() 
    {
        return view('backsite.carts.index', ['carts' => \App\Cart::with('products')->get()]);
    }

    public function addCart(Request $request) 
    {
        $request->validate([
            'total_count' => 'required|min:1'
        ]);

        if (isset(auth()->user()->cart->id)) {
            $cart = Cart::find(auth()->user()->cart->id);
        } else {
            $cart = \App\Cart::create([
                'user_id' => auth()->user()->id,
                'total_count' => $request->total_count,
                'total_price' => $request->total_price,
                'promo_code' => $request->promo_code,
            ]);
        }

        $cart->products()->save(Product::find($request->product_id));
    }
}
