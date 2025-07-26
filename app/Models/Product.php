<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
   //  protected $guarded=['id'];
    protected $fillable = [
        'name', 
        'description',
         'short_description', 
         'quantity',
          'cost_price',
           'purchase_price', 
          'old_price', 'new_price',
         'favorite',
          'brand', 
        'is_active',
         'view',
         'catgorey_id',
         'user_id',
       
       
    ] ;
    public function catgory(){
        return $this->belongsTo(Catgory::class,'catgorey_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function suppliers()
{
    return $this->belongsToMany(Supplier::class,'supplier_products','product_id','supplier_id');
}

public function cartsProduct()
{
    return $this->belongsToMany(Cart::class, 'cart_items');
}
    //
}
