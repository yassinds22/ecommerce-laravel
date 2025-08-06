<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
     public function itemsOrder()
    {
        return $this->hasMany(ItemOrder::class);
    }
    public function product()
{
    return $this->belongsTo(Product::class);
}
    //
}
