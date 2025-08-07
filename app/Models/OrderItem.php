<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable=[
       'id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'original_price',
    ];

        public function itemsOrder()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function product()
{
    return $this->belongsTo(Product::class);
}
    //
}
