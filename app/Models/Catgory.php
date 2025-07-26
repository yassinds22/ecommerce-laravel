<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catgory extends Model
{
    // protected $guarded=['id'];
    protected $fillable = [
        'name', 
        'parint', 
        'user_id'
    ];

     public function product(){
        return $this->hasMany(Product::class,'catgorey_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
  
}
