<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   
    public function productSupplier(){
        return $this->belongsToMany(Product::class,'supplier_products','supplier_id',"product_id");
    }
    //
}
