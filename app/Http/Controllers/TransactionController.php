<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::with('user')->with('products')->get();

        return view('backsite.transaction.index', ['transactions' => $data]);
        // return $data;
    }

    public function store(Request $request)
    {
        $cart = \App\Cart::with('products')->where('user_id', $request->user_id)->first();
        $transaction = Transaction::create($request->all());
        $transaction->products()->attach($cart->products);
        $cart->products()->detach();
        $cart->delete();

        return $transaction;
    }
}
