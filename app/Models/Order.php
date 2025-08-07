<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
      protected $fillable = [
        'id',
        'user_id', 
        'order_number',
        'subtotal',
        'discount',
        'tax',
        'total',
        'status',
        'order_status'
    ];
  
   

    //////

    public function user()
{
    return $this->belongsTo(User::class);
}

public function items()
{
    return $this->hasMany(OrderItem::class);
}

public function payments()
{
    return $this->hasMany(Payment::class);
}

public function products()
{
    return $this->belongsToMany(Product::class, 'order_items')
                ->withPivot('quantity', 'price');
}
    //
}
