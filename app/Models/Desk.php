<?php

namespace App\Models;



class Desk extends Model
{
    protected $fillable = ['name'];

    public function carts()
    {
    	$this->belonsto(Cart::class);
    }

    public function  products()
    {
    	$this->hasMany(Product::class);
    }
}
