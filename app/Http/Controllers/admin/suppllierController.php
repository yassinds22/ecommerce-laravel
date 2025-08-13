<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Models\Supplier;

use App\Services\SupplierService;
use Illuminate\Http\Request;

class suppllierController extends Controller
{
    public $storeSupplierService;
    public function __construct(SupplierService $storeSupplierService){
        $this->storeSupplierService = $storeSupplierService;

    }
    public function index(){
        return view("admin.addSupplier");
    }
    public function listSupplier( ){
          $suppliers = $this->storeSupplierService->showSupplier();
    
    
    
    return view("admin.listSupplier")->with("data", $suppliers);
    }

    public function store(StoreSupplierRequest $request){

       $this->storeSupplierService->storeSupplier($request->validated());
      
       




    }
    //
    public function updateSupplier($id){

            $supplier=$this->storeSupplierService->getById($id);
             return view("admin.updateSupplier")->with("data",$supplier);
    }


    public function editSupplier(StoreSupplierRequest $request,$id){
        $this->storeSupplierService->updateCatgory($id,$request->validated());
       

        //$supplier->update($request->validated());

    }




    public function deleteSupplier($id){
        $this->storeSupplierService->destroySupplier($id);
        return redirect()->back();
    }
}
