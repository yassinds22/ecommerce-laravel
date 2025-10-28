<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;

use App\Services\CartItemServices;
use App\Services\CartServices;
use App\Services\CatgoryServices;
use App\Services\ProductServices;


class homeController extends Controller
{ public $productServices,$catgoryServices,$cartServices,$cartItemServices;
    public function __construct(ProductServices $productServices,CatgoryServices $catgoryServices,CartServices $cartServices,CartItemServices $cartItemServices){
        $this->productServices = $productServices;
        $this->catgoryServices = $catgoryServices;
        $this->cartServices = $cartServices;
        $this->cartItemServices = $cartItemServices;

    }
   
    
    public function index(){
       $allProduct= $this->productServices->getAllProducts();
       
        $allCat= $this->catgoryServices->getAll();
       
        $cart = $this->cartServices->addCart();

$cartProductIds = [];

if ($cart) {
    $cartProductIds = $this->cartItemServices->getCartProductIds($cart);
}
      
       return view('clint.index',['dataCat'=>$allCat,'data'=>$allProduct,'cartProductIds'=>$cartProductIds]);
    }


    public function detailsProduct($id){
       $product= $this->productServices->getProductById($id);
        // $product=Product::find($id);
        return view('clint.detailsproduct')->with('data',$product);
    }
    //
}
