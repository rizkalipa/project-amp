<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function carts()
    {
        $this->belongsToMany(\App\Cart::class);
    }
}
