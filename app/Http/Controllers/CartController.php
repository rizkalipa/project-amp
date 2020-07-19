<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index() 
    {
        return view('backsite.carts.index', ['carts' => \App\Cart::with('products')->where('status', 'ON CART')->get()]);
    }

    public function addCart(Request $request) 
    {
        $request->validate([
            'total_count' => 'required|min:1'
        ]);

        $cart = \App\Cart::where(['status' => 'ON CART', 'user_id' => auth()->user()->id])->first();

        if (!$cart) {
            $cart = \App\Cart::create([
                'user_id' => auth()->user()->id,
                'total_count' => $request->total_count,
                'status' => 0,
                'promo_code' => $request->promo_code,
                'status' => 'ON CART'
            ]);
        }

        $cart->products()->attach(Product::find($request->product_id), ['total_count' => $request->total_count]);
    }
}
