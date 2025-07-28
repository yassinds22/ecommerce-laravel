<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItme extends Model
{
    protected $fillable = [
        "cart_id","product_id","quantity","price",
    ];
  
     public function items()
    {
        return $this->hasMany(CartItme::class);
    }
    public function product()
{
    return $this->belongsTo(Product::class);
}
}
