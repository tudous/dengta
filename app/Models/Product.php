<?php

namespace App\Models;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'img','category_id'];

    public function cart()
    {
    	$this->belongsto(Cart::class);
    }

    public function desks()
    {
    	$this->hasMany(Desk::calss);
    }

    public function category()
    {
    	$this->belongsto(Cartgory::class);
    }

}
