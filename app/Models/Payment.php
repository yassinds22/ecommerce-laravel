<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
   protected $fillable = [
    'id',
    'order_id',
    'method',
    'amount',
    'transaction_id', 
    'status',
     'is_paid',
   ];
    public function oders()  {
        return $this->belongsTo(Order::class);
        
        
    }
}
