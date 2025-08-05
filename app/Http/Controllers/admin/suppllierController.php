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
    public function listSupplier(Request $request ){
          $suppliers = Supplier::orderBy("id", "desc")->get();
    
    if ($request->ajax()) {
        return response()->json($suppliers);
    }
    
    return view("admin.listSupplier")->with("data", $suppliers);
    }
    public function store(Request $request){
        $supplier=new Supplier();
        $supplier->name=$request->name;
        $supplier->phone=$request->phone;
        $supplier->adddress=$request->address;
        $supplier->save();
        return response()->json([
            'message' => 'Supplier added successfully!',
            'data'    => $supplier
        ], 200);   




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
