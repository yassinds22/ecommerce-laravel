<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  
     public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'item_oders');
    }
    public function paymets(){
        return $this->hasMany(Payment::class);
    }
    //
}
