<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('backsite.wishlists.index', ['wishlists' => \App\Wishlist::get()]);
    }

    public function add(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $request->id
        ];

        if (!isset(auth()->user()->wishlist->id)) {
            $wishlist = \App\Wishlist::create($data);
        } else {
            $wishlist = \App\Wishlist::find(auth()->user()->wishlist->id);
        }


        $wishlist->products()->save(\App\Product::find($request->id));

        return $wishlist;
    }
}
