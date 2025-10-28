<?php 

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartServices{
    public function addCart(){
        return Cart::where('user_id', Auth::user()->id)->first();
    }
}