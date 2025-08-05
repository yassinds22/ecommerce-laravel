<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use App\Models\Product;
use Illuminate\Http\Request;

class getAllProductCatgoryController extends Controller
{

      public function allCheldernCatgory($id){
     $data = Product::where('catgorey_id' , $id)->get();
return view('clint.allCheldernCatgory', ['data'=>$data]);


    }
    //
}
