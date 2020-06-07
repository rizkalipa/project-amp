<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Product::get();

        return view('backsite.products.index', ['products' => $products]);
    }
}
