<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $result = Transaction::create($request->all());

        $cart = \App\Cart::find($request->cart_id)->update(['total_price' => $request->total_price, 'status' => 'PAID']);

        return $result;
    }
}
