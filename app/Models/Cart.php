<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['goods_id','desk_id','goods_number'];

    public function products()
    {
    	$this->hasMany(Product::class);
    }

    public function desk()
    {
    	$this->belongsto(Desk::class);
    }
}
