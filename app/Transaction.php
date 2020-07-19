<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function carts()
    {
        return $this->hasMany(\App\Cart::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function products()
    {
        return $this->belongsToMany(\App\Product::class);
    }
}
