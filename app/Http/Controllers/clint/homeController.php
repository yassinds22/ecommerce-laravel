<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use App\Models\Product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $allProduct=Product::all();
        $allCat=Catgory::all();
        return view('clint.index',['dataCat'=>$allCat,'data'=>$allProduct]);
    }
    public function detailsProduct($id){
        $product=Product::find($id);
        return view('clint.detailsproduct')->with('data',$product);
    }
    //
}
