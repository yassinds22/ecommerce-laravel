<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index(){
        $userId=Auth::user()->id;
        $orders=Order::get();
        
        return view("admin.listOrder");
        //return response()->json($orders);
    }
    //
}
