<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
  private $productServices;
  public function __construct(ProductServices $productServices){
    $this->productServices = $productServices;

  }


     public function index(){
        return view('admin.addProduct');
    }


      public function show(){

        $product =$this->productServices->getAllProducts();
        return view('admin.listProduct')->with('product',$product);

    }


    public function store(StoreProductRequest $request)
{
  
    $validated = $request->validated();
    $validated['catgorey_id'] = $request->parent;
    $validated['user_id'] = Auth::id();

  
  $product = $this->productServices->storeProduct($validated,$request->file('image'));

    if ($request->filled('supplier')) {
        $product->suppliers()->attach($request->supplier);
    }

 
    return response()->json($product);
}



  public function editProduct( $id)
      {
  $product = $this->productServices->getProductById($id);
  return view('admin.updateProduct')->with('product',$product);

}






public function update(StoreProductRequest $request, $id)
{


       $validated = $request->validated();
       $validated['user_id'] = Auth::id();
        $validated['category_id'] = $request->parent; 
       $product =$this->productServices->updateProduct($validated,$id,$request->file('image')); // تم إزالة withTrashed()

     

     //$this->productServices->updateSupplierProduct($request,$product);

     
        if ($request->filled('supplier')) {
            $product->suppliers()->sync($request->supplier);
        }

        return response()->json([
            'success' => true,
            'data' => $product->fresh(), // جلب أحدث نسخة من البيانات
            'message' => 'تم تحديث المنتج بنجاح'
        ]);

    
}

public function destroyProduct($id)
{ 
    $deleteProduct = $this->productServices->deleteProduct($id);

    if ($deleteProduct) {
        // لو الطلب AJAX، رجع JSON
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم حذف المنتج']);
        }
        return redirect()->route('listProduct')->with('success', 'تم حذف المنتج');
    } else {
        if (request()->ajax()) {
            return response()->json(['success' => false, 'message' => 'لم يتم الحذف']);
        }
        return redirect()->back()->with('error', 'لم يتم الحذف');
    }
}

 


    //
}
