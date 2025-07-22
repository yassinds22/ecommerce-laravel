<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('clint.index');
    }
    //
}
