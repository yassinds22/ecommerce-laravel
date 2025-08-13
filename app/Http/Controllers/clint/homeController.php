<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItme;
use App\Models\Catgory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $allProduct=Product::all();
        $allCat=Catgory::all();
        $cart = Cart::where('user_id', Auth::user()->id)->first();

$cartProductIds = [];

if ($cart) {
    $cartProductIds = CartItme::where('cart_id', $cart->id)->pluck('product_id')->toArray();
}
      
       return view('clint.index',['dataCat'=>$allCat,'data'=>$allProduct,'cartProductIds'=>$cartProductIds]);
    }
    public function detailsProduct($id){
        $product=Product::find($id);
        return view('clint.detailsproduct')->with('data',$product);
    }
    //
}
