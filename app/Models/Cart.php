<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function productsCart()
{
    return $this->belongsToMany(Product::class, 'cart_items');
}
    //
}
