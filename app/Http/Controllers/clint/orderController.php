<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class orderController extends Controller
{
    public function index(Request $request){
        return view("clint.orderpurchase");
    }
    //
}
