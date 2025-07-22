<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function rigster(){
        return view('auth.rigster');
    }
    public function store(Request $request){
     
           $user=new User();
        $user->name=strip_tags($request->name) ;
        $user->email=strip_tags($request->email);
        $user->password=Hash::make($request->pass);
        $user->save();
        return redirect()->route('login');
    
    }
    //
}
