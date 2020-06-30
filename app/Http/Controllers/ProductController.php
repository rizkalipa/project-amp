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

    public function create()
    {
        return view('backsite.products.create');
    }

    public function store(Request $request)
    {
        $new_product = $this->validated_data($request);

        $path_image = NULL;
        if($request->hasFile('image')) {
            $path_image = $request->file('image')->store('/product-images', 'public');
            $new_path = 'storage/' . $path_image;
        }

        $new_product['image'] = $new_path;

        \App\Product::create($new_product);

        return redirect()->route('product.index')->with(['success' => 'Success created new product!']);
    }

    public function edit(\App\Product $product) 
    {
        return view('backsite.products.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $new_product = $this->validated_data($request);

        $path_image = NULL;
        if($request->hasFile('image')) {
            $path_image = $request->file('image')->store('/product-images', 'public');
            $new_path = 'storage/' . $path_image;
            $new_product['image'] = $new_path;
        }

        \App\Product::find($request->id)->update($new_product);

        return redirect()->route('product.index')->with(['success' => 'Success Edit Product!']);
    }

    public function destroy(Request $request)
    {
        \App\Product::find($request->id)->delete();

        return redirect()->route('product.index')->with(['success' => 'Success Delete Product!']);
    }

    public function validated_data($request)
    {
        $new_product = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'total_stock' => 'required|numeric',
            'price' => 'required|numeric',
            'available_in' => '',
        ]);

        return $new_product;
    }
}
