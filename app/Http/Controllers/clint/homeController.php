<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $allProduct=Product::all();
        return view('clint.index')->with('data',$allProduct);
    }
    public function detailsProduct($id){
        $product=Product::find($id);
        return view('clint.detailsproduct')->with('data',$product);
    }
    //
}
