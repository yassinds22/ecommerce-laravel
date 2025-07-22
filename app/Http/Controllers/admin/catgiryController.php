<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class catgiryController extends Controller
{
    public function index(){
        return view('admin.addCatgory');
    }
    public function listCatgory(){
         return view('admin.listCatgory');

    }
    //
}
