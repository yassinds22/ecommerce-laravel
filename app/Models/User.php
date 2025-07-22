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
}
