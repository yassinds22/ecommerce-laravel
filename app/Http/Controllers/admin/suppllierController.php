<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class suppllierController extends Controller
{
    public function index(){
        return view("admin.addSupplier");
    }
    public function listSupplier(){
        $supplier = Supplier::all();
        return view("admin.listSupplier")->with("data",$supplier);
    }
    public function store(Request $request){
        $supplier=new Supplier();
        $supplier->name=$request->name;
        $supplier->phone=$request->phone;
        $supplier->adddress=$request->address;
        $supplier->save();
        return redirect()->back();
   




    }
    //
    public function updateSupplier($id){
$supplier=Supplier::find($id);
return view("admin.updateSupplier")->with("data",$supplier);
    }
    public function editSupplier(Request $request,$id){
        $supplier=Supplier::find($id);
        $supplier->name=$request->name;
        $supplier->phone=$request->phone;
        $supplier->adddress=$request->address;

        $supplier->save();

    }
    public function deleteSupplier($id){
        $supplier=Supplier::destroy($id);
        return redirect()->back();
    }
}
