<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {}

    public function addCart(Request $request) 
    {
        $request->validate([
            'total_count' => 'required|min:0'
        ]);

        $cart = \App\Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'total_count' => $request->total_count
        ]);

        return response()->json($cart, 200);
    }
}
