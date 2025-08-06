<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index(){
        
        $orders=Order::get();
        
        return view("admin.listOrder")->with("data",$orders);
        //return response()->json($orders);
    }
    //
}
