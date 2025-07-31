<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // يمكنك هنا تحديد الخصائص المسموحة
    protected $fillable = [
        'name', 'email', 'password', 'number', 'address',
    ];

    // لإخفاء الحقول الحساسة عند تحويلها لـ JSON
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function catgory(){
        return $this->hasMany(Catgory::class,'user_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class,'user_id','id');
    }

    public function cart()
{
    return $this->hasOne(Cart::class,'user_id','id');
}

}
