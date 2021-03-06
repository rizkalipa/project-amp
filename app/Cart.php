<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(\App\User::class);
    }

    public function products() 
    {
        return $this->belongsToMany(\App\Product::class)->withPivot('total_count');
    }

    public function transaction()
    {
        return $this->belongsTo(\App\Transaction::class);
    }
}
