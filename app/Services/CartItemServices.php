<?php 

namespace App\Services;

use App\Models\CartItme;

class CartItemServices{
    public function getCartProductIds($cart){
        return CartItme::where('cart_id', $cart->id)->pluck('product_id')->toArray();
    }
}